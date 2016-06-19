<?php


namespace Schmiddim\Amazon\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class CliController extends AbstractActionController
{

    public function productAction()
    {
        echo "productAction";

    }

    public function importAction()
    {
        echo "importAction" .PHP_EOL;

    }
}