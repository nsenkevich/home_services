<?php
namespace HomeServices\Application\UseCase\ShowBasket;

use HomeServices\Common\Application\Query;

class GetBasketQuery implements Query
{

    /**
     * @var QuoteId
     */
    private $quoteId;

    public function __construct(string $quoteId)
    {
        $this->quoteId = QuoteId::fromString($quoteId);
    }

    /**
     * @return QuoteId
     */
    public function getQuoteId()
    {
        return $this->quoteId;
    }


}