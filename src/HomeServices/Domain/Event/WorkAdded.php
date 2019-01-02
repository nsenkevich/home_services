<?php
namespace HomeServices\Domain\Event;

use HomeServices\Domain\QuoteId;
use HomeServices\Domain\WorkId;

class WorkAdded implements Event
{
    private $quoteId;
    private $workId;

    public function __construct(QuoteId $quoteId, WorkId $workId)
    {
        $this->quoteId = $quoteId;
        $this->workId = $workId;
    }
}