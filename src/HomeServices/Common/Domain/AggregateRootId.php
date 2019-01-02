<?php
namespace HomeServices\Common\Domain;

use Assert\Assertion;

class AggregateRootId
{

    /**
     * @var string
     */
    private $aggregateRootId;

    public static function fromString(string $id): self
    {
        Assertion::uuid($id);
        $aggregateRootId = new self();
        $aggregateRootId->aggregateRootId = $id;
        return $aggregateRootId;
    }

    public function getId(): string
    {
        return $this->aggregateRootId;
    }

    public function isEqualTo(self $other): bool
    {
        return $this->getId() === $other->getId();
    }

    public function __toString(): string
    {
        return $this->aggregateRootId;
    }
}