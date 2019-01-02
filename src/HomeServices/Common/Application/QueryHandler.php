<?php

namespace HomeServices\Common\Application;

interface QueryHandler
{
    public function handle(Query $query): ViewModelCollection;
}