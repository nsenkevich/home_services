<?php

interface EventSubscriber extends Listener
{
    public function handle(Event $event): void;
}