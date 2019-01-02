<?php
namespace HomeServices\Common\Domain;

class EventsCollection implements \IteratorAggregate
{
    private $events = [];

    public function __construct(array $events)
    {
        $this->events = $events;
    }

    protected function recordEvent(Event $event): void
    {
        $this->events[] = $event;
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->events);
    }
}