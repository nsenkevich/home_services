<?php
namespace HomeServices\Common\Domain;

interface WriteRepository
{
    public function save(AggregateRoot $post);
    public function byId(Identity $id):AggregateRoot;
}