<?php


namespace Schmiddim\Amazon\Doctrine\Services\Wishlist;

use Doctrine\ORM\EntityManager;
use Schmiddim\Amazon\Doctrine\Entities\Wishlist;
use Schmiddim\Amazon\Doctrine\Services\AbstractEntityService;

class WishlistService extends AbstractEntityService implements WishlistServiceInterface
{


    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
        $this->setRepositoryIdentifier(Wishlist::class);
    }

    public function findById($id)
    {

        return $this->getRepository()->find($id);
    }

    public function findByWishlistID($wishlistId)
    {

        return $this->getRepository()->findOneBy(array('amazonId' => $wishlistId));
    }

    public function persistWishList(Wishlist $wishlist)
    {
        $this->getEntityManager()->persist($wishlist);

    }


}