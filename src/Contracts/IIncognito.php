<?php

namespace rogeecn\airproxy\Contracts;


use Illuminate\Contracts\Support\Arrayable;

interface ILocation extends Arrayable
{
    public function toString();
}
