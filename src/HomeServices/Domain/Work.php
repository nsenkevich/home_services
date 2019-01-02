<?php

namespace HomeServices\Domain;

class Work
{
    private $id;
    private $name;
    private $category;
    private $subCategory;
    private $price;//: {amount: 100, currency: 'gbp'},
    private $installationTime;
    private $whatHappens;

    public function __construct(WorkId $id, $name, $category, $subCategory, $price, $installationTime, $whatHappens)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->price = $price;
        $this->installationTime = $installationTime;
        $this->whatHappens = $whatHappens;
    }


    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getId(): WorkId
    {
        return $this->id;
    }

}