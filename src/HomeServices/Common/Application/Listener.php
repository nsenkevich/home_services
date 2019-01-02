<?php

namespace HomeServices\Common\Application;

interface Listener
{
    public function listenTo(): string;
}