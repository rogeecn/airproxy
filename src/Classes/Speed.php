<?php

namespace rogeecn\airproxy\Classes;


use rogeecn\airproxy\Contracts\ISpeed;

class Speed implements ISpeed
{
    private $connection = 0;
    private $download   = 0;

    public function __construct($connection, $download = 0)
    {
        $this->download = $download;
        $this->connection = $connection;
    }

    public function connection()
    {
        return $this->connection;
    }

    public function download()
    {
        return $this->download;
    }
}
