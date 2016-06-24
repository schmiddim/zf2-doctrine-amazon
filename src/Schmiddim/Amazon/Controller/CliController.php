<?php


namespace Schmiddim\Amazon\Controller;

use Schmiddim\Amazon\Doctrine\Entities\ApaiIO\ItemNotFound;
use Schmiddim\Amazon\Doctrine\Factories\Product;
use Schmiddim\Amazon\Doctrine\Services\ItemNotFound\ItemNotFoundServiceInterface;
use Schmiddim\Amazon\Doctrine\Services\Product\ProductServiceInterface;
use Schmiddim\Amazon\Doctrine\Services\Wishlist\WishlistServiceInterface;
use Schmiddim\Amazon\ProductApi\ApaiIOWrapper;
use Zend\Mvc\Controller\AbstractActionController;

class CliController extends AbstractActionController
{

    /**
     * @var ProductServiceInterface
     */
    protected $productService;

    /**
     * @var WishlistServiceInterface
     */
    protected $wishlistService;

    /**
     * @var ApaiIOWrapper
     */
    protected $apaiIOWrapper;

    protected $itemNotFoundService;

    public function __construct(ProductServiceInterface $productService, WishlistServiceInterface $wishlistService, ItemNotFoundServiceInterface $itemNotFoundService, ApaiIOWrapper $apaiIOWrapper)
    {
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
        $this->apaiIOWrapper = $apaiIOWrapper;
        $this->itemNotFoundService = $itemNotFoundService;
    }


    public function testNotFoundAction()
    {

        $ids = array(
            "B004UMO24E",
            "B00B6U14XA",
            "B00HQ2N52K",
            "B00B8XYO9G",
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
        $countryCode = 'de';


        $entities = $this->itemNotFoundService->getRepository()->findBy(['asin' => $ids]);

        foreach ($entities as $entity) {
            /** @var $entity ItemNotFound */

            $id = array_search($entity->getAsin(), $ids);

            if ($id) {
                unset($ids[$id]);
            }
        }
        $resultSet = $this->apaiIOWrapper->getByASINS($ids, $countryCode);
        $notFound = $this->apaiIOWrapper->getItemsNotFound();
        foreach ($notFound[$countryCode] as $item) {

            if (false === $this->itemNotFoundService->existsByAsin($item)) {
                $itemNotFound = new ItemNotFound();
                $itemNotFound->setAsin($item);
                $itemNotFound->setSearchedDe(true);
                $this->itemNotFoundService->getEntityManager()->persist($itemNotFound);
        $this->itemNotFoundService->getEntityManager()->flush();
            }
        }
    }

    public function productAction()
    {

        $id = $this->getRequest()->getParam('id');

        $product = $this->productService->getProductByAsin($id);

        var_dump($product);


    }

    /**
     * @deprecated
     */
    public function importAction()
    {
        $id = $this->getRequest()->getParam('id');

        $ret = $this->wishlistService->findById($id);
        var_dump($ret);
        echo "importAction" . PHP_EOL;

    }


}
