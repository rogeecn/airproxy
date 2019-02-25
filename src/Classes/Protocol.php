<?php

namespace rogeecn\airproxy\Classes;


use Illuminate\Support\Arr;
use rogeecn\airproxy\Consts\Protocols;
use rogeecn\airproxy\Contracts\IProtocol;

class Protocol implements IProtocol
{
    private $protocol;

    public function __construct($protocol)
    {
        $this->protocol = $protocol;
    }

    public function toString()
    {
        return Arr::get(Protocols::$mapToString, $this->protocol, "");
    }
}
