<?php


namespace Schmiddim\Amazon\Doctrine\Services;

use Doctrine\ORM\EntityManager;

abstract class AbstractEntityService implements EntityServiceInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var string
     */
    private $repositoryIdentifier = null;


    /**
     * AbstractEntityService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->setEntityManager($entityManager);
    }


    public function getRepository(){
        if(null === $this->getRepositoryIdentifier()) {
            throw new \Exception('Repository Identifier not set');
        }
        return  $this->getEntityManager()->getRepository($this->getRepositoryIdentifier());
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     */
    protected function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return string
     */
    public function getRepositoryIdentifier()
    {
        return $this->repositoryIdentifier;
    }

    /**
     * @param string $repositoryIdentifier
     */
    public function setRepositoryIdentifier($repositoryIdentifier)
    {
        $this->repositoryIdentifier = $repositoryIdentifier;
    }


}