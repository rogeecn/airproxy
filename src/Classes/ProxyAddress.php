<?php

namespace rogeecn\airproxy\Classes;


use rogeecn\airproxy\Consts\Protocols;
use rogeecn\airproxy\Contracts\IProtocol;
use rogeecn\airproxy\Contracts\IProxyAddress;

class ProxyAddress implements IProxyAddress
{
    private $ip;
    private $port;
    private $protocol;

    public function __construct($ip, $port, $protocol)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->protocol = $protocol;
    }

    public function isValid(): bool
    {
        $validIP = strlen($this->ip) > 0;
        $validPort = $this->port > 0;
        $validProtocol = in_array($this->protocol, array_keys(Protocols::$mapToString));

        return $validIP && $validPort && $validProtocol;
    }

    public function ip()
    {
        return $this->ip;
    }

    public function port()
    {
        return $this->port;
    }


    public function protocol(): IProtocol
    {
        return new Protocol($this->protocol);
    }

    public function toString()
    {
        return sprintf("%s://%s:%s", $this->protocol()->toString(), $this->ip(), $this->port());
    }
}
