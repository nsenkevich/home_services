<?php

class BasketWriteRepository implements WriteRepository
{
    private $em;
    private $projector;

    public function __construct(EntityManager $em, Projector $projector)
    {
        $this->em = $em;
        $this->projector = $projector;
    }

    public function save(AggregateRoot $post)
    {
        $this->em->transactional(
            function (EntityManager $em) use ($post) {
                $em->persist($post);
                foreach ($post->releaseEvents() as $event) {
                    $em->persist($event);
                }
            }
        );

        //clear cache, update search index
        $this->projector->project($post->releaseEvents());
    }

    public function byId(Identity $id)
    {
        return $this->em->find($id);
    }
}