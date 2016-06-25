<?php


namespace Schmiddim\Amazon\Doctrine\Services\Product;

use Doctrine\ORM\EntityRepository;
use Schmiddim\Amazon\Doctrine\Entities\Product;
use Doctrine\ORM\EntityManager;
interface ProductServiceInterface
{

    public function getProductByAsin($asin);

    public function existsProductByAsin($asin);

    /**
     * @return EntityManager
     */
    public function getEntityManager();

    /**
     * @return  EntityRepository
     */
    public function getRepository();
    /**
     * @param \SimpleXMLElement $itemDetails
     * @return Product
     */
    public function createProductByXml(\SimpleXMLElement $itemDetails);
}