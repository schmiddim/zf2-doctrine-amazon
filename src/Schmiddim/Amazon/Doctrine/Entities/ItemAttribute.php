<?php


namespace Schmiddim\Amazon\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class ItemAttribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    protected $dateUpdated;
    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $name;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * @var ItemAttribute[]
     * @ORM\OneToMany(targetEntity="ItemAttribute" ,mappedBy="parentAttribute",cascade={"persist", "remove"}))

     */
    protected $childAttributes;

    /**
     * @var ItemAttribute
     * @ORM\ManyToOne(targetEntity="ItemAttribute", inversedBy="childAttributes")
     * @ORM\JoinColumn(referencedColumnName="id", name="parent_id")
     */
    protected $parentAttribute;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return ItemAttribute[]
     */
    public function getChildAttributes()
    {
        return $this->childAttributes;
    }

    /**
     * @param ItemAttribute[] $childAttributes
     */
    public function setChildAttributes($childAttributes)
    {

        $this->childAttributes = $childAttributes;
    }

    /**
     * @return mixed
     */
    public function getParentAttribute()
    {
        return $this->parentAttribute;
    }

    /**
     * @param mixed $parentAttribute
     */
    public function setParentAttribute($parentAttribute)
    {
        $this->parentAttribute = $parentAttribute;
    }





}