<?php


namespace Schmiddim\Amazon\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Product
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
    protected $asin;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $parentAsin;

    /**
     * @var int
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    protected $dateUpdated;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $productGroup;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $mpn;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $upc;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $ean;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var Image[]
     * @ORM\ManyToMany(targetEntity="Schmiddim\Amazon\Doctrine\Entities\Image"
     *, cascade={"persist", "remove"})
     **/
    protected $images = array();

    /**
     * @ORM\ManyToMany(targetEntity="Offer",
     * cascade={"persist", "remove"})
     **/
    protected $offers = array();

    /**
     * @var ItemAttribute[]
     * @ORM\ManyToMany(targetEntity="ItemAttribute", cascade={"persist", "remove"})
     */
    protected $itemAttributes = array();

    /**
     * @var Price
     * @ORM\OneToOne(targetEntity="Price" ,cascade={"persist", "remove"}))
     * @ORM\JoinColumn(name="listPrice", referencedColumnName="id")
     *
     */
    protected $listPrice;


    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $detailPageUrl;


    /**
     * @return Image[]
     */
    public function getImagesSmall()
    {
        $images = array();
        foreach ($this->images as $image) {

            if ($image->getType() === Image::SIZE_SMALL) {
                $images [] = $image;

            }
        }
        return $images;
    }

    /**
     * @return Image[]
     */
    public function getImagesMedium()
    {
        $images = array();
        foreach ($this->images as $image) {
            if ($image->getType() === Image::SIZE_MEDIUM) {
                $images [] = $image;

            }
        }
        return $images;
    }

    /**
     * @return Image[]
     */
    public function getImagesLarge()
    {
        $images = array();
        foreach ($this->images as $image) {
            if ($image->getType() === Image::SIZE_LARGE) {
                $images [] = $image;

            }
        }
        return $images;
    }

    /**
     * @param \SimpleXMLElement $element
     */
    public function setByResponseObject(\SimpleXMLElement $element)
    {

        $this->setAsin((string)$element->ASIN);
        $this->setParentAsin((string)$element->ParentASIN);
        $this->setProductGroup((string)$element->ItemAttributes->ProductGroup);
        $this->setTitle((string)$element->ItemAttributes->Title);
        $this->setDetailPageUrl((string)$element->DetailPageUrl);
        $this->setEan((string)$element->ItemAttributes->EAN);
        $this->setUpc((string)$element->ItemAttributes->UPC);
        $this->setDetailPageUrl((string)$element->DetailPageURL);
        $this->setMpn((string)$element->ItemAttributes->MPN);

        //@todo images
        //@todo price

        $itemAttributeVars = get_object_vars($element->ItemAttributes);
        foreach ($itemAttributeVars as $name => $value) {
              if ($value instanceof \SimpleXMLElement) {
                $itemAttributeEntity = new ItemAttribute();
                $itemAttributeEntity->setName($name);
                $itemAttributeEntity->setValue('NESTED');
                $childAttributes = $this->generateChildAttributes($value);
                foreach ($childAttributes as $childAttribute) {
                    $childAttribute->setParentAttribute($itemAttributeEntity);
                }
                $itemAttributeEntity->setChildAttributes($childAttributes);
            } else {
                $itemAttributeEntity = new ItemAttribute();
                $itemAttributeEntity->setName($name);
                $itemAttributeEntity->setValue(strval($value));
            }
            $this->addItemAttribute($itemAttributeEntity);
        }
    }

    /**
     * For the xml thing - created the nested attribute structure
     * @param array $attributes
     * @return ItemAttribute[]
     */
    protected function generateChildAttributes($attributes = array())
    {
        $itemAttributeEntities = array();
        foreach ($attributes as $name => $value) {
            if ($value instanceof \SimpleXMLElement) {
                $itemAttributeEntity = new ItemAttribute();
                $itemAttributeEntity->setName($name);
                $itemAttributeEntity->setValue('NESTED');
                $childAttributes = $this->generateChildAttributes($value);
                foreach ($childAttributes as $childAttribute) {
                    $childAttribute->setParentAttribute($itemAttributeEntity);
                }
                $itemAttributeEntity->setChildAttributes($childAttributes);
            } else {
                $itemAttributeEntity = new ItemAttribute();
                $itemAttributeEntity->setName($name);
                $itemAttributeEntity->setValue(strval($value));
            }
        }
        return $itemAttributeEntities;
    }
    /******automatic generated GETTERS + SETTERS *******************/


    /**
     * @return mixed
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
    public function getAsin()
    {
        return $this->asin;
    }

    /**
     * @param mixed $asin
     */
    public function setAsin($asin)
    {
        $this->asin = $asin;
    }

    /**
     * @return int
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param int $dateUpdated
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }

    /**
     * @return mixed
     */
    public function getProductGroup()
    {
        return $this->productGroup;
    }

    /**
     * @param mixed $productGroup
     */
    public function setProductGroup($productGroup)
    {
        $this->productGroup = $productGroup;
    }

    /**
     * @return mixed
     */
    public function getDetailPageUrl()
    {
        return $this->detailPageUrl;
    }

    /**
     * @param mixed $detailPageUrl
     */
    public function setDetailPageUrl($detailPageUrl)
    {
        $this->detailPageUrl = $detailPageUrl;
    }

    /**
     * @return Image[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getParentAsin()
    {
        return $this->parentAsin;
    }

    /**
     * @param mixed $parentAsin
     */
    public function setParentAsin($parentAsin)
    {
        $this->parentAsin = $parentAsin;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * @param string $mpn
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;
    }

    /**
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * @param string $upc
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return  Offer[]
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @param array $offers
     */
    public function setOffers(array $offers)
    {
        $this->offers = $offers;
    }

    /**
     * @return Price
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * @param Price $listPrice
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;
    }

    /**
     * @return ItemAttribute[]
     */
    public function getItemAttributes()
    {
        return $this->itemAttributes;
    }

    /**
     * @param ItemAttribute[] $itemAttributes
     */
    public function setItemAttributes($itemAttributes)
    {
        $this->itemAttributes = $itemAttributes;
    }


    /******automatic generated GETTERS + SETTERS *******************/
    /**
     * @param ItemAttribute $itemAttribute
     */
    public function addItemAttribute(ItemAttribute $itemAttribute)
    {
        $this->itemAttributes[] = $itemAttribute;
    }

}