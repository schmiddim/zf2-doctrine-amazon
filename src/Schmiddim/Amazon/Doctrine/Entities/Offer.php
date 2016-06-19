<?php


namespace Schmiddim\Amazon\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Price",
     * cascade={"persist", "remove"})
     * @var Price
     */
    protected $price;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $offerListingId;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $availabilityType;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $minimumHours;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $maximumHours;


    /**
     * @param \SimpleXMLElement $element
     * @param Price $price
     */
    public function setByResponseObject(\SimpleXMLElement $element, Price $price)
    {

        $this->setOfferListingId(
            (string)$element->Offers->Offer->OfferListing->OfferListingId
        );
        $this->setAvailabilityType(
            (string)$element->Offers->Offer->OfferListing->AvailabilityAttributes->AvailabilityType
        );
        $this->setMinimumHours(
            (int)$element->Offers->Offer->OfferListing->AvailabilityAttributes->MinimumHours
        );
        $this->setMaximumHours(
            (int)$element->Offers->Offer->OfferListing->AvailabilityAttributes->MaximumHours
        );
        $this->setPrice($price);


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
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Amazon\Entity\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getOfferListingId()
    {
        return $this->offerListingId;
    }

    /**
     * @param string $offerListingId
     */
    public function setOfferListingId($offerListingId)
    {
        $this->offerListingId = $offerListingId;
    }

    /**
     * @return string
     */
    public function getAvailabilityType()
    {
        return $this->availabilityType;
    }

    /**
     * @param string $availabilityType
     */
    public function setAvailabilityType($availabilityType)
    {
        $this->availabilityType = $availabilityType;
    }

    /**
     * @return string
     */
    public function getMinimumHours()
    {
        return $this->minimumHours;
    }

    /**
     * @param string $minimumHours
     */
    public function setMinimumHours($minimumHours)
    {
        $this->minimumHours = $minimumHours;
    }

    /**
     * @return string
     */
    public function getMaximumHours()
    {
        return $this->maximumHours;
    }

    /**
     * @param string $maximumHours
     */
    public function setMaximumHours($maximumHours)
    {
        $this->maximumHours = $maximumHours;
    }

}