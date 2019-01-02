<?php
namespace HomeServices\Common\Domain;

interface AggregateRoot extends Identity
{
    public function releaseEvents(): EventsCollection;

}