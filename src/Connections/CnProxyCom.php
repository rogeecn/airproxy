<?php

namespace rogeecn\airproxy\Connections;


use GuzzleHttp\Client;
use rogeecn\airproxy\Classes\ProxyAddress;
use rogeecn\airproxy\Contracts\IConnection;

class CnProxyCom implements IConnection
{
    private $pageURL;

    /** @var Client */
    private $client;

    public function __construct($pageURL)
    {
        $this->pageURL = $pageURL;
        $this->init();
    }

    public function init()
    {
        $this->client = new Client([
            'timeout' => 5.0,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'
            ]
        ]);
    }


    public function addresses(): array
    {
        $response = $this->client->get($this->pageURL);
        \phpQuery::$documents = [];
        \phpQuery::newDocumentHTML($response->getBody());

        $addresses = [];

        pq(".table-container tbody tr")->each(function ($item) use (&$addresses) {
            $ip = trim(pq($item)->find('td:eq(0)')->text());
            $port = trim(pq($item)->find('td:eq(1)')->text());

            $address = new ProxyAddress($ip, $port);
            if ($address->isValid()) {
                $addresses[] = $address;
            }
        });

        return $addresses;
    }
}
