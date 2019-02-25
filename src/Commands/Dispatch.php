<?php

namespace rogeecn\airproxy\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use rogeecn\airproxy\Contracts\IAdapter;
use rogeecn\airproxy\Jobs\CrawlProxyAddress;

class Dispatch extends Command
{
    protected $signature = 'airproxy:dispatch';

    protected $description = 'dispatch pending crawl pages';

    public function handle()
    {
        $this->line("spider running...");

        $connections = Config::get("airproxy.connections");
        dump($connections);

        foreach ($connections as $connection) {
            $this->info($this->message($connection, "{$connection['domain']} {$connection['description']}..."));

            if (!$connection['enable']) {
                $this->warn($connection, "connection is disabled");
                continue;
            }

            $pages = [];
            foreach ($connection['pages'] as $connectionPage) {
                if (is_array($connectionPage)) {
                    /** @var IAdapter $adapter */
                    $adapter = new $connectionPage['adapter']($connectionPage);
                    $pages = array_merge($pages, $adapter->generate());
                    continue;
                }

                $pages[] = $connectionPage;
            }

            $pageCount = count($pages);
            $this->info($this->message($connection, "$pageCount pages will be crawl"));
            if ($pageCount == 0) {
                return;
            }

            $queue = Config::get("airproxy.queue.address");
            foreach ($pages as $pageURL) {
                $this->info($this->message($connection, "push {$pageURL} to crawl address task list"));
                dispatch(new CrawlProxyAddress($connection['connection'], $pageURL))->onQueue($queue);
            }
        }
    }

    private function message($connection, $message)
    {
        return "[{$connection['domain']}] $message";
    }
}
