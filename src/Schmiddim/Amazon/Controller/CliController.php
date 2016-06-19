<?php


namespace Schmiddim\Amazon\Controller;

use Schmiddim\Amazon\Doctrine\Factories\Product;
use Schmiddim\Amazon\Doctrine\Services\Product\ProductServiceInterface;
use Schmiddim\Amazon\Doctrine\Services\Wishlist\WishlistServiceInterface;
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

    public function __construct(ProductServiceInterface $productService, WishlistServiceInterface $wishlistService)
    {
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;

    }

    public function productAction()
    {

        $id = $this->getRequest()->getParam('id');

        $product = $this->productService->getProductByAsin($id);

        var_dump($product);


    }

    public function importAction()
    {
        $id = $this->getRequest()->getParam('id');

        $ret = $this->wishlistService->findById($id);
        var_dump($ret);
        echo "importAction" . PHP_EOL;

    }


}
