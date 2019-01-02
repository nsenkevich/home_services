<?php

namespace HomeServices\Application\Middleware;

use HomeServices\Common\Application\Query;
use HomeServices\Common\Application\QueryBusMiddleware;
use HomeServices\Common\Application\ViewModelCollection;
use Psr\Cache\CacheItemInterface;

class CacheQueryBusMiddleware implements QueryBusMiddleware
{
    private $next;
    private $cache;

    public function __construct(QueryBusMiddleware $next, CacheItemInterface $cache)
    {
        $this->next = $next;
        $this->cache = $cache;
    }

    public function dispatch(Query $query): ViewModelCollection
    {
        $this->cache;
        return $this->next->dispatch($query);

    }
}