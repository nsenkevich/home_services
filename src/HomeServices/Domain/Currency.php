<?php

namespace HomeServices;


class Currency
{
    const DEFAULT_CODE = 'GBP';

    private $code;

    public function getCode() : string
    {
        return $this->code;
    }

}