<?php

return [
    'queue'       => [
        'address' => env('AIR_PROXY_QUEUE_ADDRESS', 'anyproxy_address'),
        'verify'  => env('AIR_PROXY_QUEUE_ADDRESS', 'anyproxy_verify'),
    ],
    'connections' => [
        [
            'connection'  => \rogeecn\airproxy\Connections\FreeProxyCZ::class,
            'domain'      => 'http://free-proxy.cz',
            'description' => '新鲜代理列表',
            'enable'      => true,
            'pages'       => [
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://free-proxy.cz/zh/proxylist/main/{--page--}',
                    'from'     => 1,
                    'to'       => 10,
                ]
            ],
        ],
    ]
];
