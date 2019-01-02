<?php
namespace HomeServices\Application\UseCase\AddWorkToBasket;

use HomeServices\Common\Application\Command;
use HomeServices\Domain\QuoteId;
use HomeServices\Domain\WorkId;

class AddWorkToBasketCommand implements Command
{
    /**
     * @var QuoteId
     */
    private $quoteId;

    /**
     * @var WorkId
     */
    private $workId;

    public function __construct(string $quoteId, string $workId)
    {
        $this->quoteId = QuoteId::fromString($quoteId);
        $this->workId = WorkId::fromString($workId);
    }

    public function getWorkId(): WorkId
    {
        return $this->workId;
    }

    public function getQuoteId(): QuoteId
    {
        return $this->quoteId;
    }
}