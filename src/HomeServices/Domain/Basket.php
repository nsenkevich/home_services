<?php

namespace HomeServices\Domain;

use Doctrine\Common\Collections\ArrayCollection;
use HomeServices\Domain\Work;

class Basket extends ArrayCollection
{

    public function getWorks()
    {

    }

    /**
     * @return int
     */
    public function getTotalPrice()
    {
        $count = 0;
        $works = $this->getIterator();
        /** @var Work $work */
        foreach ($works as $work) {
            $count += $work->getPrice();
        }

        return $count;
    }
}