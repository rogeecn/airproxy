<?php

namespace rogeecn\airproxy\Adapters;


use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use rogeecn\airproxy\Contracts\IAdapter;

class Pagination implements IAdapter
{
    private $config;
    private $keyword = '{--page--}';

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function generate(): array
    {
        $from = Arr::get($this->config, 'from', 1);
        $to = Arr::get($this->config, 'to');

        if (intval($to) < intval($from)) {
            throw new Exception('pagination config param to is less than from');
        }

        $template = Arr::get($this->config, 'template');
        if (empty($template)) {
            throw new Exception('template configure param is required');
        }

        $pages = [];
        $pageRange = range($from, $to);

        foreach ($pageRange as $pageIndex) {
            $pages[] = Str::replaceFirst($this->keyword, $pageIndex, $template);
        }

        return $pages;
    }
}
