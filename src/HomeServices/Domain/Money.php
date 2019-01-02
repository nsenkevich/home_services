<?php

namespace HomeServices;


class Money
{

    private $amount;
    private $currency;

    private function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }


    public static function GBP(int $value)
    {
        return new Money($value, new Currency(Currency::DEFAULT_CODE));
    }

    public function add(Money $money)
    {
        $this->amount += $money->getAmount();
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency->getCode();
    }

}