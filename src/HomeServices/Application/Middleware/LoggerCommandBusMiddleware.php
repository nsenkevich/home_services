<?php

namespace HomeServices\Application\Middleware;

use HomeServices\Common\Application\Command;
use HomeServices\Common\Application\CommandBusMiddleware;
use Psr\Log\LoggerInterface;

class LoggerCommandBusMiddleware implements CommandBusMiddleware
{
    private $next;
    private $logger;

    public function __construct(CommandBusMiddleware $next, LoggerInterface $logger)
    {
        $this->next = $next;
        $this->logger = $logger;
    }

    public function dispatch(Command $command): void
    {
        $this->logger->showOutput("je log");
        $this->next->dispatch($command);
        $this->logger->showOutput("je log encore");
    }
}