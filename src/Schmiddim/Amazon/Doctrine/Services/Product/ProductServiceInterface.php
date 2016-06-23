<?php


namespace Schmiddim\Amazon\Doctrine\Services\Product;

use Schmiddim\Amazon\Doctrine\Services\EntityServiceInterface;

interface ProductServiceInterface extends EntityServiceInterface
{

    public function getProductByAsin($asin);

    public function existsProductByAsin($asin);

    public function createProductByXml(\SimpleXMLElement $itemDetails);
}