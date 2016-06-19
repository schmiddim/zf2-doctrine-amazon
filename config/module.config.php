<?php
namespace Schmiddim\Amazon;

use Schmiddim\Amazon\Controller\CliController;

return array(
    'controllers' => array(
        'invokables' => array(
            CliController::class => CliController::class
        )


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
                'import-wishlist' => array(
                    'options' => array(
                        // add [ and ] if optional ( ex : [<doname>] )
                        'route' => 'importWishlist [-v] <id>',
                        'defaults' => array(
                            '__NAMESPACE__' => 'Schmiddim\Amazon\Controller',
                            'controller' => 'CliController',
                            'action' => 'import'
                        ),
                    ),
                )
            )
        )
    )
);