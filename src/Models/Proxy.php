<?php

namespace rogeecn\airproxy\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use rogeecn\airproxy\Classes\Incognito;
use rogeecn\airproxy\Classes\ProxyAddress;
use rogeecn\airproxy\Classes\Speed;
use rogeecn\airproxy\Contracts\IIncognito;
use rogeecn\airproxy\Contracts\IProxyAddress;
use rogeecn\airproxy\Contracts\IProxyItem;
use rogeecn\airproxy\Contracts\ISpeed;

/**
 * Class Proxy
 *
 * @package rogeecn\airproxy\Models
 */
class Proxy extends Model implements IProxyItem
{
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function protocol()
    {
        return $this->hasOne(Protocol::class);
    }

    public function address(): IProxyAddress
    {
        return new ProxyAddress($this->ip, $this->port);
    }

    public function incognito(): IIncognito
    {
        return new Incognito($this->incognito);
    }

    public function verifyAt(): Carbon
    {
        return $this->verify_at;
    }

    public function speed(): ISpeed
    {
        return new Speed($this->speed_connection, $this->speed_download);
    }

}
