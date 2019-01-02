<?php

use HomeServices\Application\UseCase\RemoveWorkToBasket\RemoveWorkFromBasketCommand;
use HomeServices\Application\UseCase\AddWorkToBasket\AddWorkToBasketCommand;
use HomeServices\Application\UseCase\ShowBasket\GetBasketQuery;

use HomeServices\Common\Application\CommandBus;
use HomeServices\Common\Application\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;

class Basket
{

    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    /**
     * @Route("/quote/{quoteId}/works/{workId}", methods="DELETE")
     */
    public function delete(string $quoteId, string $workId)
    {
        try {
            $this->commandBus->dispatch(new RemoveWorkFromBasketCommand($quoteId, $workId));
            return new JsonResponse(['success' => true], 200, []);
        } catch (\Exception $exception) {
            return new JsonResponse(['errors' => $exception->getMessage()], 404, []);
        }
    }

    /**
     * @Route("/quote/{quoteId}/works/{workId}", methods="POST")
     */
    public function create(string $quoteId, string $workId)
    {
        try {
            $this->commandBus->dispatch(new AddWorkToBasketCommand($quoteId, $workId));
            return new JsonResponse(['success' => true], 200, []);
        } catch (\Exception $exception) {
            return new JsonResponse(['errors' => $exception->getMessage()], 404, []);
        }
    }

    /**
     * @Route("/quote/{quoteId}/works", methods="GET")
     */
    public function fetchBasket($quoteId)
    {
        try {
            $basket = $this->queryBus->dispatch(new GetBasketQuery($quoteId));
            return new JsonResponse($basket, 200, []);
        } catch (\Exception $exception) {
            return new JsonResponse(['errors' => $exception->getMessage()], 404, []);
        }
    }
}