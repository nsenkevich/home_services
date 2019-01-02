<?php
namespace HomeServices\Domain;

use HomeServices\Work;

interface BasketRepository
{
    public function get(AggregateRootId $id): Category;
    public function store(Category $category): void;
}