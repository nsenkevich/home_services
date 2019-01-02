<?php

namespace HomeServices;


class Builder
{
    private $name;
    private $connectionDetails;
    private $address;

    public function __construct(Name $name, ConnectionDetails $connectionDetails, Address $address)
    {
        $this->name = $name;
        $this->connectionDetails = $connectionDetails;
        $this->address = $address;
    }

}