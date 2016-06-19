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
}