<?php

namespace rogeecn\airproxy\Connections;


use GuzzleHttp\Client;
use Illuminate\Support\Str;
use rogeecn\airproxy\Classes\ProxyAddress;
use rogeecn\airproxy\Contracts\IConnection;

class WwwGoubanjiaCom implements IConnection
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
        pq("#services tbody td.ip")->each(function ($item) use (&$addresses) {
            $ip = "";
            pq($item)->children()->each(function ($child) use (&$ip) {
                if (Str::contains(pq($child)->attr('style'), 'none')) {
                    return;
                }

                if (pq($child)->hasClass('port')) {
                    return;
                }

                $ip .= trim(pq($child)->text());
            });

            $port = pq($item)->find('.port')->text();

            $address = new ProxyAddress($ip, $port);
            if ($address->isValid()) {
                $addresses[] = $address;
            }
        });

        return $addresses;
    }
}
