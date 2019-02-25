<?php

namespace rogeecn\airproxy\Classes;


use rogeecn\airproxy\Contracts\IProxyAddress;

class ProxyAddress implements IProxyAddress
{
    private $ip;
    private $port;

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    public function isValid(): bool
    {
        $validIP = strlen($this->ip) > 0;
        $validPort = $this->port > 0;

        return $validIP && $validPort;
    }

    public function ip()
    {
        return $this->ip;
    }

    public function port()
    {
        return $this->port;
    }


    public function toString()
    {
        return sprintf("%s:%s", $this->ip(), $this->port());
    }
}
