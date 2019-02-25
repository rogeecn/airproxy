<?php

namespace rogeecn\airproxy\Consts;


class Protocols
{
    const HTTP  = 0;
    const HTTPS = 1;
    const SOCKS = 2;

    public static $mapToString = [
        self::HTTP  => 'HTTP',
        self::HTTPS => 'HTTPS',
        self::SOCKS => 'SOCKS',
    ];

    public static $mapToId = [
        'http'   => self::HTTP,
        'https'  => self::HTTPS,
        'socks'  => self::SOCKS,
        'socks5' => self::SOCKS,
        'socks4' => self::SOCKS,
    ];
}
