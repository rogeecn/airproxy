<?php

namespace rogeecn\airproxy\Classes;


use rogeecn\airproxy\Contracts\ILocation;

class Location implements ILocation
{
    private $country;
    private $province;
    private $city;
    private $area;

    public function __construct($country = null, $province = null, $city = null, $area = null)
    {
        $this->country = $country;
        $this->province = $province;
        $this->area = $area;
        $this->city = $city;
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
