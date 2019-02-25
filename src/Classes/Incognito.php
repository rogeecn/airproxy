<?php

namespace rogeecn\airproxy\Classes;


use rogeecn\airproxy\Consts\Incognitos;
use rogeecn\airproxy\Contracts\IIncognito;

class Incognito implements IIncognito
{
    private $level;

    public function __construct($level)
    {
        $this->level = $level;
    }

    public function isTransparent(): bool
    {
        return $this->level == Incognitos::LEVEL_TRANSPARENT;
    }

    public function isIncognitoNormal(): bool
    {
        return $this->level == Incognitos::LEVEL_INCOGNITO_NORMAL;
    }

    public function isIncognitoHigh(): bool
    {
        return $this->level == Incognitos::LEVEL_INCOGNITO_HIGH;
    }
}
