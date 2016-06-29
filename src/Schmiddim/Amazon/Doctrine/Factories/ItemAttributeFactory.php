<?php


namespace Schmiddim\Amazon\Doctrine\Factories;

use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Services\ItemAttribute\ItemAttributeService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class ItemAttributeFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $container, $name, array
    $options = null)
    {
        /**
         * @var $entityManager EntityManager
         */
        $entityManager = $container->get(EntityManager::class);

        return new ItemAttributeService($entityManager);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, ItemAttributeService::class);

    }
}