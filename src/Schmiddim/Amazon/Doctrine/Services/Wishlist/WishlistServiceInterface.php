<?php


namespace Schmiddim\Amazon\Doctrine\Services\Wishlist;


use Schmiddim\Amazon\Doctrine\Entities\Wishlist;

interface WishlistServiceInterface
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

}