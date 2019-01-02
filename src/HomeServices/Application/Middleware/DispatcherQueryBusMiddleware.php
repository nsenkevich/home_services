<?php

namespace HomeServices\Application\Middleware;

use HomeServices\Common\Application\Query;
use HomeServices\Common\Application\QueryBusMiddleware;
use HomeServices\Common\Application\QueryHandler;
use HomeServices\Common\Application\ViewModelCollection;

class DispatcherQueryBusMiddleware implements QueryBusMiddleware
{
    /**
     * @var QueryHandler []
     */
    private $handlers;

    public function __construct(array $handlers)
    {
        foreach ($handlers as $handler) {
            $query = get_class($handler).replace("Handler","");
            $this->handlers[$query] = $handler;
        }
    }

    public function dispatch(Query $query): ViewModelCollection
    {
        $className = get_class($query);
        $queryHandler = $this->handlers[$className];
        if ($queryHandler === null) {
            throw new \LogicException("Handler for command $className not found");
        }
        $queryHandler->handle($query);
    }

}