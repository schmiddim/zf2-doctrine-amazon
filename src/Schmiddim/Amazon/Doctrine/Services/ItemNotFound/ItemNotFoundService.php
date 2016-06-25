<?php


namespace Schmiddim\Amazon\Doctrine\Services\ItemNotFound;


use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Entities\ApaiIO\ItemNotFound;
use Schmiddim\Amazon\Doctrine\Services\AbstractEntityService;

class ItemNotFoundService extends AbstractEntityService implements ItemNotFoundServiceInterface
{

    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);

        $this->setRepositoryIdentifier(ItemNotFound::class);
    }

    public function existsByAsin($asin)
    {
        if (null !== $this->findOneByAsin($asin)) {
            return true;
        }
        return false;
    }

    public function findOneByAsin($asin)
    {
        $product = $this->getRepository()->findOneBy(array(
            'identifierType' => 'ASIN',
            'identifier' => $asin


        ));
        return $product;
    }

    public function findByAsin($asins = array())
    {
        return $this->getRepository()->findBy(array(
            'identifierType' => 'ASIN',
            'identifier' => $asins


        ));
    }
}