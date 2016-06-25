<?php


namespace Schmiddim\Amazon\Doctrine\Services\ItemNotFound;


use Schmiddim\Amazon\Doctrine\Services\EntityServiceInterface;

interface ItemNotFoundServiceInterface extends EntityServiceInterface
{


    public function findOneByAsin($asin);

    public function findByAsin($asins = array());
    public function existsByAsin($asin);
}