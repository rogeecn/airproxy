<?php

namespace rogeecn\airproxy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use rogeecn\airproxy\Consts\Protocols;
use rogeecn\airproxy\Contracts\IProtocol;

class Protocol extends Model implements IProtocol
{
    protected $fillable = ['http', 'https', 'sock4', 'sock5'];

    public function toString()
    {
        return Arr::get(Protocols::$mapToString, $this->protocol, "");
    }
}
