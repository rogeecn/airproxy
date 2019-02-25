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

    public function scopeIp($query, $ip)
    {
        $query->where('ip', $ip);
    }

    public function scopePort($query, $port)
    {
        $query->where('port', $port);
    }

    public static function addOrUpdate(IProxyAddress $address, $support)
    {
        $model = self::ip($address->ip())->port($address->port())->first();
        if (!$model) {
            $model = new static();
            $model->ip = $address->ip();
            $model->port = $address->port();
            $model->verify_at = Carbon::now();
            $model->save();
            $model->protocol()->save(new Protocol($support));
            return true;
        }
        $model->verify_at = Carbon::now();
        $model->save();

        $model->protocol->http = $support['http'];
        $model->protocol->https = $support['https'];
        $model->protocol->sock4 = $support['sock4'];
        $model->protocol->sock5 = $support['sock5'];
        return $model->protocol->save();
    }
}
