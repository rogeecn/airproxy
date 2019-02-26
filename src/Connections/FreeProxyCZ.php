<?php

namespace rogeecn\airproxy\Connections;


use GuzzleHttp\Client;
use Illuminate\Support\Str;
use rogeecn\airproxy\Classes\ProxyAddress;
use rogeecn\airproxy\Contracts\IConnection;

class FreeProxyCZ implements IConnection
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
            'proxy'   => 'http://proxy.lfk.360es.cn:3128',
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
        pq("#proxy_list tbody tr")->each(function ($item) use (&$addresses) {
            $rawIP = pq($item)->find('td:eq(0)')->text();
            $rawPort = pq($item)->find('td:eq(1)')->text();

            $ip = base64_decode(Str::substr($rawIP, strlen('document.write(Base64.decode("'), -strlen('"))"')));
            $port = intval($rawPort);

            $address = new ProxyAddress($ip, $port);
            if ($address->isValid()) {
                $addresses[] = $address;
            }
        });

        return $addresses;
    }
}
