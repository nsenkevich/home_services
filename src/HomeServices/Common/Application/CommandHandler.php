<?php

namespace HomeServices\Common\Application;

interface CommandHandler extends Listener
{
    public function handle(Command $command): void;
}