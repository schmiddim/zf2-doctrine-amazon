<?php
return array(
    'modules' => array(
        'Schmiddim\Amazon\Doctrine',
        'DoctrineModule',
        'DoctrineORMModule',
    ),
    'module_listener_options' => array(
        'config_glob_paths' => array(
            '../../../config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            'module',
            'vendor',
        ),
    ),

    'amazon-apai' => array(
        'AWS_API_KEY' => '<your api key>',
        'AWS_API_SECRET_KEY' => '<your secret>',
        'AWS_ASSOCIATE_TAG' => '<your tag>',
    )
,
    'productTesting' => array(
        'fixtures' => array(
            '3570049426'=>  'fixtures/3570049426.xml',
            'B00KY20LL2'=> 'fixtures/B00KY20LL2.xml',
            'B004UMNUE2'=> 'fixtures/B004UMNUE2.xml'
        )

    )


);