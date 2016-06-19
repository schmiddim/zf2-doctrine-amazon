<?php
namespace Schmiddim\Amazon;

use Schmiddim\Amazon\Controller\CliController;
use Schmiddim\Amazon\Controller\Factories\CliControllerFactory;
use Schmiddim\Amazon\Doctrine\Services\Product\ProductServiceInterface;
use Schmiddim\Amazon\Doctrine\Factories\ProductServiceFactory;
use Schmiddim\Amazon\Doctrine\Services\Wishlist\WishlistServiceInterface;
use Schmiddim\Amazon\Doctrine\Factories\WishlistServiceFactory;

return array(
    'controllers' => array(
        'factories' => array(
            CliController::class =>
                CliControllerFactory::class
        )
    ),

    'service_manager' => array(
        'factories' => array(
            ProductServiceInterface::class => ProductServiceFactory::class,
            WishlistServiceInterface::class => WishlistServiceFactory::class
        ),
    ),


    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Schmiddim/Amazon/Doctrine/Entities')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Schmiddim\Amazon\Doctrine\Entities' => 'application_entities'
                )
            )
        )
    ),


    'console' => array(
        'router' => array(
            'routes' => array(
                'product' => array(
                    'options' => array(
                        'route' => 'product <id>',
                        'defaults' => array(

                            'controller' => CliController::class,
                            'action' => 'product'
                        ),
                    ),
                )
            )
        )
    )
);