<?php
/**
 * Created by PhpStorm.
 * User: nikolai
 * Date: 2018-12-15
 * Time: 19:53
 */

namespace HomeServices;


class QuoteBuilder
{
    private $id;
    private $builder;
    private $homeOwner;
    private $works;
    private $dateTime;
    private $address;

    public function withBuilder(Builder $builder): Quote
    {
        $this->builder = $builder;
        return $this;
    }

    public function withHomeOwner(HomeOwner $homeOwner):Quote
    {
        $this->homeOwner = $homeOwner;
        return $this;
    }

    public function withWork(Work $work)
    {
        $this->works->add($work);
        return $this;
    }

    public function withDateTime(DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    public function scheduleQuote()
    {
        return new Quote('id', $this->builder, $this->homeOwner, $this->dateTime, $this->address);
    }
}