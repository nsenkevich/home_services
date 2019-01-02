<?php

namespace HomeServices\Common\Application;

interface QueryMiddleware
{
    public function process(Query $request, QueryHandler $handler): void;

}