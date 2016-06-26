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


    /**
     * @return Product
     */
    protected function getFixtureMovieA()
    {
        $config = $this->serviceManager->get('ApplicationConfig');
        $fixtures = $config['productTesting']['fixtures'];

        //lords of salem     $fixtures['B00KY20LL2']
        $product = new Product();
        $xml = simplexml_load_file($fixtures['B00KY20LL2']);
        $product->setByResponseObject($xml->Items->Item);
        return $product;
    }

    /**
     * @return Product
     */
    protected function getFixtureBookA()
    {
        $config = $this->serviceManager->get('ApplicationConfig');
        $fixtures = $config['productTesting']['fixtures'];

        //lords of salem     $fixtures['B00KY20LL2']
        $product = new Product();
        $xml = simplexml_load_file($fixtures['3570049426']);
        $product->setByResponseObject($xml->Items->Item);
        return $product;
    }

    public function testCreateProductByXml()
    {

        $product = $this->getFixtureMovieA();
        $this->assertEquals('B00KY20LL2', $product->getAsin());
        $this->assertEquals('Lords of Salem', $product->getTitle());
        $this->assertCount(12, $product->getItemAttributes());


        $product = $this->getFixtureBookA();
        $this->assertEquals('3570049426', $product->getAsin());

        $this->assertEquals(
            'http://www.amazon.de/Anton-kleine-Vampir-N-F-Weihnachten/dp/3570049426%3FSubscriptionId%3D1C40MS11Y3T9CRFXPQ82%26tag%3Dhttpwwwradika-21%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3D3570049426',
            $product->getDetailPageUrl()
        );

        $this->assertEquals('Anton und der kleine Vampir, N.F., 7: Fröhliche Weihnachten', $product->getTitle());
        $this->assertCount(20, $product->getItemAttributes());
        /**
         * @todo images
         * @todo offers
         * @todo listPrice
         *
         */

    }

    public function testSearchByIdentifier()
    {

        $product = $this->getFixtureBookA();
        $this->assertFalse($product->hasIdentifier('fooobar'));
        $this->assertEquals('ISBN', $product->hasIdentifier('3570049426'));
        $this->assertEquals('EAN', $product->hasIdentifier('9783570049426'));

        //@todo find product where ASIN !== isbn
        //@todo EAN LIST
    }
}