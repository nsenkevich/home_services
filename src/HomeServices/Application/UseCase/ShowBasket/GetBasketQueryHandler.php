<?php
namespace HomeServices\Application\UseCase\ShowBasket;

use HomeServices\Domain\ReadBasketRepository;

class GetBasketQueryHandler implements QueryHandler
{
    /**
     * @var ReadBasketRepository
     */
    private $readBasketRepository;

    public function __construct(ReadBasketRepository $basketRepository)
    {
        $this->readBasketRepository = $basketRepository;
    }

    public function handle(GetBasketQuery $query): array
    {
        return array_map(function ($basket) {
            return BasketViewModel::fromEntity($basket);
        }, $this->readBasketRepository->findQuoteBasket($query->getQuoteId()));
    }
}