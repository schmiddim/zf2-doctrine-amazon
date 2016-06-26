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

        $this->assertEquals('B00KY20LL2', $product->getAsin());
        $this->assertEquals('Lords of Salem', $product->getTitle());
        $this->assertCount(12, $product->getItemAttributes());


        //vampirbuch
        $product = new Product();
        $xml = simplexml_load_file($fixtures['3570049426']);
        $product->setByResponseObject($xml->Items->Item);

        $this->assertEquals('3570049426', $product->getAsin());
        $this->assertEquals('Anton und der kleine Vampir, N.F., 7: Fröhliche Weihnachten', $product->getTitle());
        $this->assertCount(20, $product->getItemAttributes());

    }

    public function testSearchByIdentifier()
    {

        $config = $this->serviceManager->get('ApplicationConfig');
        $fixtures = $config['productTesting']['fixtures'];


        $product = new Product();
        $xml = simplexml_load_file($fixtures['3570049426']);
        $product->setByResponseObject($xml->Items->Item);

        $this->assertFalse($product->hasIdentifier('fooobar'));

        $this->assertEquals('ISBN', $product->hasIdentifier('3570049426'));
        $this->assertEquals('EAN', $product->hasIdentifier('9783570049426'));

        //@todo find product where ASIN !== isbn
        //@todo EAN LIST
    }
}