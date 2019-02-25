<?php

namespace rogeecn\airproxy\Contracts;

interface IConnection
{
    public function init();

    public function addresses(): array;
}
