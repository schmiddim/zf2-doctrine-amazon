<?php


namespace Schmiddim\Amazon\Doctrine\Factories;


use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Services\Product\ProductService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;
use Schmiddim\Amazon\Doctrine\Services\ItemNotFound\ItemNotFoundService;
class ItemNotFoundFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $container, $name, array
    $options = null)
    {
        /**
         * @var $entityManager EntityManager
         */
        $entityManager = $container->get(EntityManager::class);

        return new ItemNotFoundService($entityManager);
    }
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, ItemNotFoundService::class);

    }


}