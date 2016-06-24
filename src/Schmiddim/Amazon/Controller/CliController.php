<?php


namespace Schmiddim\Amazon\Controller;

use Schmiddim\Amazon\Doctrine\Factories\Product;
use Schmiddim\Amazon\Doctrine\Services\Product\ProductServiceInterface;
use Schmiddim\Amazon\Doctrine\Services\Wishlist\WishlistServiceInterface;
use Schmiddim\Amazon\ProductApi\ApaiIOWrapper;
use Schmiddim\Amazon\WishlistImporter\Services\SynchronizeDbAgainstAmazonInterface;
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

    public function __construct(ProductServiceInterface $productService, WishlistServiceInterface $wishlistService, ApaiIOWrapper $apaiIOWrapper)
    {
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
        $this->apaiIOWrapper = $apaiIOWrapper;
    }


    public function testNotFoundAction()
    {
        $id = $this->getRequest()->getParam('id');


        echo $id;

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
