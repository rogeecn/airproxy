<?php

namespace rogeecn\airproxy\Traits;

use Illuminate\Support\Arr;
use rogeecn\airproxy\Contracts\IAdapter;

trait PageItemGenerator
{
    public function pages(): array
    {
        $pageItems = Arr::get($this->configure, 'pages');

        $pageResult = [];
        foreach ($pageItems as $pageItem) {
            if (is_array($pageItem)) {
                /** @var IAdapter $adapter */
                $adapter = (new $pageItem['adapter']($pageItem));
                $pageResult += $adapter->generate();
                continue;
            }

            $pageResult[] = $pageItem;
        }

        return $pageResult;
    }
}
