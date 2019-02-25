<?php

namespace rogeecn\airproxy\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use rogeecn\airproxy\Contracts\IProxyAddress;
use rogeecn\airproxy\Models\Proxy;

class Check implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var IProxyAddress */
    protected $address;
    /** @var Client */
    protected $client;

    public function __construct(IProxyAddress $address)
    {
        $this->address = $address;
    }

    public function handle()
    {
        $this->client = new Client(['timeout' => 10, 'verify' => false]);

        $support = [
            'http'  => $this->supportHTTP(),
            'https' => $this->supportHTTPS(),
            'sock5' => false,
            'sock4' => false,
        ];

        Proxy::addOrUpdate($this->address, $support);
    }

    private function supportHTTP()
    {
        $url = 'http://www.sogou.com/robots.txt';
        try {
            $response = $this->client->get($url, [
                'proxy' => "http://" . $this->address->toString(),
            ]);

            $contain = Str::contains($response->getBody(), 'Disallow');

            return $contain;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function supportHTTPS()
    {
        $url = 'https://www.so.com/robots.txt';
        try {
            $response = $this->client->get($url, [
                'proxy' => "http://" . $this->address->toString(),
            ]);

            $contain = Str::contains($response->getBody(), 'Disallow');

            return $contain;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function supportSOCKS()
    {
    }
}
