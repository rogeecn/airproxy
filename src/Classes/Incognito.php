<?php

namespace rogeecn\airproxy\Contracts;


class Incognito
{
    const LEVEL_TRANSPARENT      = 0;
    const LEVEL_INCOGNITO_NORMAL = 1;
    const LEVEL_INCOGNITO_HIGH   = 2;

    private $level;

    public function __construct($level)
    {
        $this->level = $level;
    }

    public function isTransparent()
    {
        return $this->level == static::LEVEL_TRANSPARENT;
    }

    public function isIncognitoNormal()
    {
        return $this->level == static::LEVEL_INCOGNITO_NORMAL;
    }

    public function isIncognitoHigh()
    {
        return $this->level == static::LEVEL_INCOGNITO_HIGH;
    }
}
