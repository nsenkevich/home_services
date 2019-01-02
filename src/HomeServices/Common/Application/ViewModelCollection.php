<?php

namespace HomeServices\Common\Application;

use ArrayIterator;

interface ViewModelCollection
{
    public function getIterator(): ArrayIterator;
}