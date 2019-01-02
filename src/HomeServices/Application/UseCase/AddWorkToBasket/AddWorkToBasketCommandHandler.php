<?php
namespace HomeServices\Application\UseCase\AddWorkToBasket;

use HomeServices\Common\Domain\EventPublisher;
use HomeServices\Common\Domain\WriteRepository;
use HomeServices\Domain\Quote;

class AddWorkToBasketCommandHandler implements CommandHandler
{
    private $quoteRepository;
    private $workRepository;
    private $eventPublisher;

    public function __construct(WriteRepository $quoteRepository, WriteRepository $workRepository, EventPublisher $eventPublisher)
    {
        $this->quoteRepository = $quoteRepository;
        $this->workRepository = $workRepository;
        $this->eventPublisher = $eventPublisher;
    }

    public function handle(AddWorkToBasketCommand $command): void
    {
        //check existences
        /** @var Quote $quote */
        $quote = $this->quoteRepository->byId($command->getQuoteId());
        $work = $this->workRepository->byId($command->getWorkId());
        $quote->addWork($work);
        $this->quoteRepository->save($quote);
        foreach ($quote->releaseEvents() as $event) {
            $this->eventPublisher->publish($event);
        }
    }

}