<?php

namespace Product;

use AmazonDoctrine\Bootstrap;
use Schmiddim\Amazon\Doctrine\Entities\Product;
use Zend\ServiceManager\ServiceManager;

class ProductCreateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServiceManager();
    }

    public function testCreateProductByXml()
    {
        $config = $this->serviceManager->get('ApplicationConfig');
        $fixtures = $config['productTesting']['fixtures'];


        //lords of salem     $fixtures['B00KY20LL2']
        $product = new Product();
        $xml = simplexml_load_file($fixtures['B00KY20LL2']);
        $product->setByResponseObject($xml->Items->Item);


//vampir        $fixtures['3570049426']
        $break = true;
    }
}