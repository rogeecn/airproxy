<?php

namespace rogeecn\airproxy\Contracts;


interface IIncognito
{
    public function isTransparent(): bool;

    public function isIncognitoNormal(): bool;

    public function isIncognitoHigh(): bool;
}

