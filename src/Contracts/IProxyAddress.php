<?php

namespace rogeecn\airproxy\Contracts;

interface IProxyAddress
{
    public function ip();

    public function port();

    public function toString();

    public function isValid(): bool;
}
