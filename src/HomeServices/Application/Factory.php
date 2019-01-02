<?php
namespace HomeServices\Application;

use HomeServices\Application\Middleware\CacheQueryBusMiddleware;
use HomeServices\Application\Middleware\DispatcherCommandBusMiddleware;
use HomeServices\Application\Middleware\DispatcherQueryBusMiddleware;
use HomeServices\Application\Middleware\DoctrineFlushCommandBusMiddleware;
use HomeServices\Application\Middleware\LoggerCommandBusMiddleware;
use HomeServices\Common\Application\CommandBus;
use HomeServices\Common\Application\QueryBus;
use Psr\Cache\CacheItemInterface;
use Psr\Log\LoggerInterface;

class Factory
{
    static function buildCommandBus(array $handlers, LoggerInterface $logger, EntityManagerInterface $entityManager): CommandBus
    {
        $commandBusMiddleware = new DispatcherCommandBusMiddleware($handlers);
        $loggerBusMiddleware = new LoggerCommandBusMiddleware($commandBusMiddleware, $logger);
        $doctrine = new DoctrineFlushCommandBusMiddleware($loggerBusMiddleware, $entityManager);

        return $doctrine;
    }

    static function buildQueryBus(array $handlers, CacheItemInterface $cache): QueryBus
    {
        $queryBusMiddleware = new DispatcherQueryBusMiddleware($handlers);
        $commandBusMiddleware = new CacheQueryBusMiddleware($queryBusMiddleware, $cache);
        return $commandBusMiddleware;
    }

}