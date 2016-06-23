<?php


namespace Schmiddim\Amazon\Doctrine\Services;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

interface EntityServiceInterface
{

    /**
     * @return EntityManager
     */
    public function getEntityManager();

    /**
     * @return EntityRepository
     */
    public function getRepository();
}