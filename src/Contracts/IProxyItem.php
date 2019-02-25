<?php

namespace rogeecn\airproxy\Contracts;

use Carbon\Carbon;

interface IProxyItem
{
    public function ip();

    public function port();

    public function protocol();

    public function location(): ILocation;

    public function incognito(): IIncognito;

    public function verifyAt(): Carbon;

    public function speed(): ISpeed;
}
