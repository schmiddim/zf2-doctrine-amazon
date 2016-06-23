<?php


namespace Schmiddim\Amazon\Doctrine\Services\Wishlist;


use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Entities\Wishlist;
use Schmiddim\Amazon\Doctrine\Services\EntityServiceInterface;

interface WishlistServiceInterface extends EntityServiceInterface
{

    /**
     * @param $id
     * @return Wishlist|null
     */
    public function findById($id);

    /**
     * @param $wishlistId
     * @return Wishlist|null
     */
    public function findByWishlistID($wishlistId);

    /**
     * @param Wishlist $wishlist
     * @return null
     */
    public function persistWishList(Wishlist $wishlist);

    /**
     * @return EntityManager
     */
    public function getEntityManager();

}