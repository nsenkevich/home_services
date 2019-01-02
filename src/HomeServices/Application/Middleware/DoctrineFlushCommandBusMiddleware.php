<?php

namespace HomeServices\Application\Middleware;

use HomeServices\Common\Application\Command;
use HomeServices\Common\Application\CommandMiddleware;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineFlushCommandBusMiddleware implements CommandMiddleware
{

    private $next;
    private $entityManager;

    public function __construct(CommandBusMiddleware $next, EntityManagerInterface $entityManager)
    {
        $this->next = $next;
        $this->entityManager = $entityManager;
    }

    public function process(Command $command): void
    {
        $this->entityManager->getConnection()->beginTransaction();
        try {
            $this->next->dispatch($command);
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();
        } catch (\Exception $e) {
            $this->entityManager->getConnection()->rollBack();
        }
    }
}