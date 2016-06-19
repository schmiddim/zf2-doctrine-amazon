<?php


namespace Schmiddim\Amazon\Doctrine\Services\Product;


interface ProductServiceInterface
{

    public function getProductByAsin($asin);
    public function existsProductByAsin($asin);
}