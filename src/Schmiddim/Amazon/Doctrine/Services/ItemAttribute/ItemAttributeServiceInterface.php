<?php


namespace Schmiddim\Amazon\Doctrine\Services\ItemAttribute;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
interface ItemAttributeServiceInterface
{
    /**
     * @return EntityManager
     */
    public function getEntityManager();

    /**
     * @return  EntityRepository
     */
    public function getRepository();
}