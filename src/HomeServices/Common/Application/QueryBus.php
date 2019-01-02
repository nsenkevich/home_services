<?php

namespace HomeServices\Common\Application;

interface QueryBus
{
    //public function subscribe(QueryHandler $handler): void;

    public function dispatch(Query $query): ViewModelCollection;
}