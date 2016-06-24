<?php


namespace Schmiddim\Amazon\Doctrine\Services\ItemNotFound;


use Schmiddim\Amazon\Doctrine\Entities\ApaiIO\ItemNotFound;
use Schmiddim\Amazon\Doctrine\Services\AbstractEntityService;
use Doctrine\ORM\EntityManager;

class ItemNotFoundService extends AbstractEntityService implements ItemNotFoundServiceInterface
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);

        $this->setRepositoryIdentifier(ItemNotFound::class);
    }

}