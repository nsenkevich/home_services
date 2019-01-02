<?php

class ProjectorBus
{

    private $projections;

    public function register(array $projections)
    {
        foreach ($projections as $projection) {
            $listensTo = $projection->listensTo();
            $this->projections[$listensTo] = $projection;
        }
    }

    public function project(array $events)
    {
        foreach ($events as $event) {
            if (isset($this->projections[get_class($event)])) {
                $this
                    ->projections[get_class($event)]
                    ->project($event);
            }
        }
    }
}