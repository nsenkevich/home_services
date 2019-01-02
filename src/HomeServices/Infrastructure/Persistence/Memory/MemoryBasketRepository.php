<?php

use HomeServices\Common\Domain\Identity;
use HomeServices\Common\Domain\WriteRepository;
use HomeServices\Common\Domain\AggregateRoot;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping;

class MemoryBasketRepository extends EntityRepository implements WriteRepository
{
    public function __construct(EntityManager $em, string $entityName)
    {
        parent::__construct($em, new Mapping\ClassMetadata($entityName));
    }

    public function save(AggregateRoot $basket)
    {
        $this->getEntityManager()->persist($basket);
        $this->getEntityManager()->flush();
    }

    public function byId(Identity $id): AggregateRoot
    {
        return $this->findOneBy(['id' => $id]);
    }
}