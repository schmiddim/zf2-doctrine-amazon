<?php


namespace Schmiddim\Amazon\Doctrine\Services\ItemNotFound;


use Schmiddim\Amazon\Doctrine\Entities\ApaiIO\ItemNotFound;
use Schmiddim\Amazon\Doctrine\Services\EntityServiceInterface;

interface ItemNotFoundServiceInterface extends EntityServiceInterface
{


    public function findOneByAsin($asin);

    /**
     * @param array $asins
     * @return ItemNotFound[]
     */
    public function findByAsin($asins = array());
    public function existsByAsin($asin);

    /**
     * @param array $isbns
     * @return ItemNotFound[]
     */
    public function findByISBNS($isbns=array());

    }