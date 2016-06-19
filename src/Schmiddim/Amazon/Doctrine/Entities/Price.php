<?php


namespace Schmiddim\Amazon\Doctrine\Entities;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Price
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime");
     * @var \DateTime
     */
    protected $date;

    /**
     * @ORM\Column(type="integer");
     * @var int
     *
     */
    protected $amount;

    /**
     * @ORM\Column(type="string")
     */
    protected $currencyCode;


    /**
     * @param \SimpleXMLElement $element
     */
    public function setByResponseObject(\SimpleXMLElement $element)
    {
        $this->setAmount(
            (integer)$element->Amount

        );
        $this->setCurrencyCode(
            (string)$element->CurrencyCode


        );
    }

    public function __construct()
    {
        $this->setDate(new \DateTime());
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}