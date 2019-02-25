<?php

namespace rogeecn\airproxy\Contracts;

use Carbon\Carbon;

interface IProxyItem
{
    public function address(): IProxyAddress;

    public function incognito(): IIncognito;

    public function verifyAt(): Carbon;

    public function speed(): ISpeed;
}
