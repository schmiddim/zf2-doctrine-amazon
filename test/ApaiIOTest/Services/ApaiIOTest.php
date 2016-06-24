<?php

namespace ApaiIOTest\Services;


use ApaiIOTest\Bootstrap;
use Schmiddim\Amazon\Doctrine\Entities\ApaiIO\ItemNotFound;
use Schmiddim\Amazon\Doctrine\Factories\ProductServiceFactory;
use Schmiddim\Amazon\ProductApi\ApaiIOWrapper;
use Schmiddim\Amazon\WishlistImporter\Factories\SynchronizeDbAgainstAmazonFactory;
use Schmiddim\Amazon\WishlistImporter\Services\SynchronizeDbAgainstAmazon;
use Zend\ServiceManager\ServiceManager;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Schmiddim\Amazon\Doctrine\Services\ItemNotFound\ItemNotFoundServiceInterface;

class ApaiIOTest extends AbstractHttpControllerTestCase
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServiceManager();
        $this->setApplicationConfig(
            include 'TestConfig.php'
        );
        parent::setUp();
    }

    public function testEquals()
    {


        $ids = array(
            "B004UMO24E",
            "B00B6U14XA",
            "B00HQ2N52K",
            "B00B8XYO9G",
            "B00L3S2LWS",
            "B00L3S2LWS",
            "c3d33ab7-5dc5-41e6-8d2a-0aadbcffb738",
            "B00NH3GL96",
            "B00EKH4FP0",
            "50d98962-9561-4028-9282-37191f8772e3",
            "B008TUNEFG",
            "B00GG0GKDO",
            "B00CO79BXO",
            "B00O6BO6O0",
            "B00NPO529C",
            "B00NPIB7Z6",
            "B00H6MMV20",
            "B00NPLNUQ2",
            "B00NPLNRWY",
            "B00O5NGFBQ",
            "B00FXYJ568",
            "B005K00TLU",
            "B00IJEFRSY",
            "B00JQ4KY5C",
            "B00IJEFRSY",
            "B00J6ZHEHC",
            "B00J6ZHEHC",
            "B00B9CFYBI",
            "e6bb95b8-6af6-4dc8-bcd8-c6950c0ab046",
            "B00N02YOJ8",
            "B00EDGGW54",
            "B00D83XPTE",
            "B00M4YVHLQ",
            "B00NAGZB4Q",
            "B00L7N451E",
            "B00N1Q6Z86",
            "B00O1AJBU0",
            "B00H377PVK",
            "B00JPXT2WK",
            "B005SG6ELU",
            "B00LWXT17C",
            "B00LWXT22G",
            "B00O09LGIW",
            "B00NEF3KNW",
            "B00NN7B7FE",
            "B00JJWLB4O",
            "B00HS0H41S",
            "B00JQQPEC8",
            "B00O1HTQ0I",
            "B00GS02S8S",
        );


        $config = $this->getApplicationConfig()['amazon-apai'];
        $apaiIoWrapper = new ApaiIOWrapper($config);


        /*

           #     $result2 =  $apaiIoWrapper->getByASIN('B00EDGGW54', 'de');
          #      $result2 =  $apaiIoWrapper->getByASIN('B00N02YOJ8', 'de');

           #     $result =  $apaiIoWrapper->getByASIN('B00GS02S8S', 'de');
                #$result2 =  $apaiIoWrapper->getByASIN('B00EDGGW54', 'de');

        */

        /**
         * @var $itemNotFoundService ItemNotFoundServiceInterface
         */
        $itemNotFoundService = $this->serviceManager->get(ItemNotFoundServiceInterface::class);

        $countryCode = 'de';
        $resultSet = $apaiIoWrapper->getByASINS($ids, $countryCode);

        $notFound = $apaiIoWrapper->getItemsNotFound();


        foreach ($notFound[$countryCode] as $item) {
            $itemNotFound = new ItemNotFound();
            $itemNotFound->setAsin($item);
            $itemNotFound->setSearchedDe(true);
            $itemNotFoundService->getEntityManager()->persist($itemNotFound);
        }
        $itemNotFoundService->getEntityManager()->flush();
        $break = true;
    }


}