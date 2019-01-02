<?php

namespace HomeServices\Domain;

use Doctrine\Common\Collections\ArrayCollection;
use DateTime;
use HomeServices\Common\Domain\AggregateRoot;
use HomeServices\Common\Domain\EventsCollection;

class Quote extends EventsCollection implements AggregateRoot
{

    private $id;
    private $builder;
    private $homeOwner;
    private $basket;
    private $dateTime;
    private $address;

    public function __construct(
        $id, Builder $builder, HomeOwner $homeOwner,  DateTime $dateTime, Address $address)
    {
        $this->id = $id;
        $this->builder = $builder;
        $this->homeOwner = $homeOwner;
        $this->dateTime = $dateTime;
        $this->address = $address;
        $this->basket = new Basket();
    }

    public function addWork(Work $work): void
    {
        if ($this->basket->contains($work)) {
            throw new InvalidArgumentException('Team already exist');
        }

        $this->basket->add($work);
        $this->recordEvent(new Event\WorkAdded($this->id, $work->getId()));
    }

    public function removeWork(Work $work): void
    {
        if ($this->basket->contains($work)) {
            throw new InvalidArgumentException('Team already exist');
        }

        $this->basket->remove($work);
    }

    public function getBasket(): Collection
    {
        return $this->basket;
    }

    public function getTotalPrice(): Money
    {
        return $this->getTotalPrice();
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function releaseEvents(): EventsCollection
    {
        return $this->getIterator();
    }

    public function getId(): string
    {
        return $this->id;
    }
}