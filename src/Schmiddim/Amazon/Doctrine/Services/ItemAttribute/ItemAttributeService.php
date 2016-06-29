<?php


namespace Schmiddim\Amazon\Doctrine\Services\ItemAttribute;

use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Services\AbstractEntityService;

use Schmiddim\Amazon\Doctrine\Entities\ItemAttribute;

class ItemAttributeService extends AbstractEntityService implements ItemAttributeServiceInterface
{
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
        $this->setRepositoryIdentifier(ItemAttribute::class);
    }
}