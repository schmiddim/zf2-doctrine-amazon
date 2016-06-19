<?php


namespace Schmiddim\Amazon\Doctrine\Factories;

use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Services\Wishlist\WishlistService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class WishlistServiceFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $container, $name, array
    $options = null)
    {
        /**
         * @var $entityManager EntityManager
         */
        $entityManager = $container->get(EntityManager::class);

        return new WishlistService($entityManager);
    }

    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, WishlistService::class);
    }

}