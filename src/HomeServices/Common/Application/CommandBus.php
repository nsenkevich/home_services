<?php

namespace HomeServices\Common\Application;

interface CommandBus
{
    //public function subscribe(CommandHandler $handler): void;

    public function dispatch(Command $command): void;
}