<?php

namespace HomeServices\Application\Middleware;


use HomeServices\Common\Application\Command;
use HomeServices\Common\Application\CommandBusMiddleware;
use HomeServices\Common\Application\CommandHandler;

class DispatcherCommandBusMiddleware implements CommandBusMiddleware
{
    /**
     * @var CommandHandler []
     */
    private $handlers;

    public function __construct(array $handlers)
    {
        foreach ($handlers as $handler) {
            $command = get_class($handler).replace("Handler","").'Command';
            $this->handlers[$command] = $handler;
        }
    }

    public function dispatch(Command $command): void
    {
        $commandClassName = get_class($command);
        $commandHandler = $this->handlers[$commandClassName];
        if ($commandHandler === null) {
            throw new \LogicException("Handler for command $commandClassName not found");
        }
        $commandHandler->handle($command);
    }

}