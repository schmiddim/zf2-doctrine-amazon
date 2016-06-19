<?php


namespace Schmiddim\Amazon\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\ORM\Mapping\ManyToMany;

/** @ORM\Entity */
class Wishlist
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $amazonId;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $wishlistOwnerName;

    /**
     * var string
     * @ORM\Column(type="string")
     */
    protected $tld;
    /**
     * @ManyToMany(targetEntity="Product")
     * @var array
     */
    protected $products = array();

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAmazonId()
    {
        return $this->amazonId;
    }

    /**
     * @param mixed $amazonId
     */
    public function setAmazonId($amazonId)
    {
        $this->amazonId = $amazonId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getWishlistOwnerName()
    {
        return $this->wishlistOwnerName;
    }

    /**
     * @param mixed $wishlistOwnerName
     */
    public function setWishlistOwnerName($wishlistOwnerName)
    {
        $this->wishlistOwnerName = $wishlistOwnerName;
    }

    /**
     * @return \Amazon\Entity\Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->products[] = $product;
    }

    /**
     * @return mixed
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * @param mixed $tld
     */
    public function setTld($tld)
    {
        $this->tld = $tld;
    }

    public function getLinkToWishlist()
    {
        return sprintf('http://www.amazon.%s/gp/registry/wishlist/%s', $this->getTld(), $this->getAmazonId());
    }
}