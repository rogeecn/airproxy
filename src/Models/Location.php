<?php

namespace rogeecn\airproxy\Models;

use Illuminate\Database\Eloquent\Model;
use rogeecn\airproxy\Contracts\ILocation;

class Location extends Model implements ILocation
{
    public function proxy()
    {
        return $this->belongsTo(Proxy::class);
    }

    public function toString()
    {
        return sprintf("%s/%s/%s/%s", $this->country, $this->province, $this->city, $this->area);
    }

    public function toArray()
    {
        return [
            'country'  => $this->country,
            'province' => $this->province,
            'city'     => $this->city,
            'area'     => $this->area,
        ];
    }

}
