<?php
namespace HomeServices\Application\UseCase\ShowBasket;

use HomeServices\Common\Application\ViewModelCollection;
use ArrayIterator;
use HomeServices\Domain\Basket;

class BasketViewModel implements ViewModelCollection
{

    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public static function fromEntity(Basket $basket): self
    {
        return new self($basket);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->basket->getWorks());
    }
}