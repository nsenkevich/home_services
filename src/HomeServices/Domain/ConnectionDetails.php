<?php

namespace HomeServices;


class ConnectionDetails
{
    private $email;
    private $phone;

    public function __construct(string $email, string $phone)
    {
        $this->email = $email;
        $this->phone = $phone;
    }


}