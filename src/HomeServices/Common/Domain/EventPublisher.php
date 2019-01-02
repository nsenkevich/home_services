<?php
namespace HomeServices\Common\Domain;

interface EventPublisher
{
    public function subscribe(EventSubscriber $eventSubscriber): void;
    public function publish(Event $event): void;
}