<?php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping;
use HomeServices\Domain\Basket;
use HomeServices\Domain\ReadBasketRepository;

class ReadMemoryBasketRepository extends EntityRepository implements ReadBasketRepository
{
    public function __construct(EntityManager $em, string $entityName)
    {
        parent::__construct($em, new Mapping\ClassMetadata($entityName));
    }

    public function findQuoteBasket($quoteId): Basket
    {
        return new Basket();
    }
}