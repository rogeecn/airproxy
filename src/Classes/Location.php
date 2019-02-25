<?php

namespace rogeecn\airproxy\Contracts;


class Location
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

    public function __toString()
    {
        return sprintf("%s/%s/%s/%s", $this->country, $this->province, $this->city, $this->area);
    }

}
