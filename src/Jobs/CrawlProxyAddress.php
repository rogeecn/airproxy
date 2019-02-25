<?php

namespace rogeecn\airproxy\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use rogeecn\airproxy\Classes\ProxyAddress;
use rogeecn\airproxy\Contracts\IConnection;

class CrawlProxyAddress implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $by;
    protected $page;

    public function __construct($by, $page)
    {
        $this->by = $by;
        $this->page = $page;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /** @var IConnection $connection */
        $connection = new $this->by($this->page);

        /** @var ProxyAddress $address */
        foreach ($connection->addresses() as $address) {
            Log::info("pending check proxy address: {$address->toString()}");
        }
    }
}
