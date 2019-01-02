<?php
namespace HomeServices\Domain;

interface ReadBasketRepository
{
    public function findQuoteBasket($quoteId): Basket;
}