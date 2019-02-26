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
        [
            'connection'  => \rogeecn\airproxy\Connections\WwwXicidailiCom::class,
            'domain'      => 'https://www.xicidaili.com/',
            'description' => '西刺免费代理IP',
            'enable'      => true,
            'pages'       => [
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'https://www.xicidaili.com/wn/{--page--}',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'https://www.xicidaili.com/nt/{--page--}',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'https://www.xicidaili.com/nn/{--page--}',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'https://www.xicidaili.com/wt/{--page--}',
                    'from'     => 1,
                    'to'       => 5,
                ]
            ],
        ],
        [
            'connection'  => \rogeecn\airproxy\Connections\WwwGoubanjiaCom::class,
            'domain'      => 'http://www.goubanjia.com/',
            'description' => '全网代理IP',
            'enable'      => true,
            'pages'       => [
                'http://www.goubanjia.com/',
            ],
        ],
        [
            'connection'  => \rogeecn\airproxy\Connections\WwwKuaidailiCom::class,
            'domain'      => 'https://www.kuaidaili.com/free/intr/',
            'description' => '快代理',
            'enable'      => true,
            'pages'       => [
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'https://www.kuaidaili.com/free/intr/{--page--}/',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'https://www.kuaidaili.com/free/inha/{--page--}/',
                    'from'     => 1,
                    'to'       => 5,
                ]
            ],
        ],

        [
            'connection'  => \rogeecn\airproxy\Connections\WwwIp3386Net::class,
            'domain'      => 'http://www.ip3366.net/',
            'description' => '云代理',
            'enable'      => true,
            'pages'       => [
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://www.ip3366.net/free/?stype=1&page={--page--}/',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://www.ip3366.net/free/?stype=2&page={--page--}/',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://www.ip3366.net/free/?stype=3&page={--page--}/',
                    'from'     => 1,
                    'to'       => 5,
                ],
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://www.ip3366.net/free/?stype=4&page={--page--}/',
                    'from'     => 1,
                    'to'       => 5,
                ]
            ],
        ],
        [
            'connection'  => \rogeecn\airproxy\Connections\WwwData5uCom::class,
            'domain'      => 'http://www.data5u.com/',
            'description' => '无忧代理IP',
            'enable'      => true,
            'pages'       => [
                'http://www.data5u.com/free/index.shtml',
                'http://www.data5u.com/free/gngn/index.shtml',
                'http://www.data5u.com/free/gnpt/index.shtml',
                'http://www.data5u.com/free/gwgn/index.shtml',
                'http://www.data5u.com/free/gwpt/index.shtml',
            ],
        ],

        [
            'connection'  => \rogeecn\airproxy\Connections\CnProxyCom::class,
            'domain'      => 'https://cn-proxy.com',
            'description' => '中国ip地址',
            'enable'      => true,
            'pages'       => [
                'https://cn-proxy.com'
            ],
        ],

        [
            'connection'  => \rogeecn\airproxy\Connections\Www66IpCn::class,
            'domain'      => 'http://www.66ip.cn/',
            'description' => '66代理',
            'enable'      => true,
            'pages'       => [
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://www.66ip.cn/{--page--}.html',
                    'from'     => 1,
                    'to'       => 10,
                ]
            ],
        ],

        [
            'connection'  => \rogeecn\airproxy\Connections\Www89ipCn::class,
            'domain'      => 'http://www.89ip.cn/',
            'description' => '89代理',
            'enable'      => true,
            'pages'       => [
                [
                    'adapter'  => \rogeecn\airproxy\Adapters\Pagination::class,
                    'template' => 'http://www.89ip.cn/index_{--page--}.html',
                    'from'     => 1,
                    'to'       => 10,
                ]
            ],
        ],
        [
            'connection'  => \rogeecn\airproxy\Connections\ProxyMimvpCom::class,
            'domain'      => 'https://proxy.mimvp.com/',
            'description' => '米扑IP',
            'enable'      => true,
            'pages'       => [
                'https://proxy.mimvp.com/',

            ],
        ],
        [
            'connection'  => \rogeecn\airproxy\Connections\WwwFeiyiproxyCom::class,
            'domain'      => 'http://www.feiyiproxy.com/',
            'description' => '飞蚁代理',
            'enable'      => true,
            'pages'       => [
                'http://www.feiyiproxy.com/?page_id=1457',
            ],
        ],
    ]
];
