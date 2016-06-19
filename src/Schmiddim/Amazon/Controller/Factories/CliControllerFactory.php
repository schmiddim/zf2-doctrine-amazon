<?php


namespace Schmiddim\Amazon\Controller\Factories;


use Schmiddim\Amazon\Controller\CliController;
use Schmiddim\Amazon\Doctrine\Services\Product\ProductServiceInterface;
use Schmiddim\Amazon\Doctrine\Services\Wishlist\WishlistServiceInterface;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class CliControllerFactory implements FactoryInterface
{

    public function __invoke(ControllerManager $container, $name, array
    $options = null)
    {
        /**
         * @var $productService ProductServiceInterface
         */
        $productService = $container->getServiceLocator()->get(ProductServiceInterface::class);

        /**
         * @var $wishlistService WishlistServiceInterface
         */
        $wishlistService = $container->getServiceLocator()->get(WishlistServiceInterface::class);

        return new CliController($productService, $wishlistService);
    }

    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, CliController::class);
    }

}