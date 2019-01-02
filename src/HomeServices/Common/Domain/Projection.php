<?php

interface Projection
{
    public function listensTo();
    public function project($event);
}