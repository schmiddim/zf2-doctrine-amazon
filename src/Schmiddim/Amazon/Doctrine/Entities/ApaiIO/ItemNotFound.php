<?php
namespace Schmiddim\Amazon\Doctrine\Entities\ApaiIO;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class ItemNotFound
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $identifier;

    /**
     * @ORM\Column(type="string", unique=false)
     */
    protected $identifierType;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $searchedCom = false ;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $searchedDe = false;

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
    public function getSearchedCom()
    {
        return $this->searchedCom;
    }

    /**
     * @param mixed $searchedCom
     */
    public function setSearchedCom($searchedCom)
    {
        $this->searchedCom = $searchedCom;
    }

    /**
     * @return mixed
     */
    public function getSearchedDe()
    {
        return $this->searchedDe;
    }

    /**
     * @param mixed $searchedDe
     */
    public function setSearchedDe($searchedDe)
    {
        $this->searchedDe = $searchedDe;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier($identifier)
    {
        $identifier = strtoupper($identifier);
        $this->identifier = $identifier;
    }

    /**
     * @return mixed
     */
    public function getIdentifierType()
    {
        return $this->identifierType;
    }

    /**
     * @param mixed $identifierType
     */
    public function setIdentifierType($identifierType)
    {
        $identifierType = strtoupper($identifierType);
        $this->identifierType = $identifierType;
    }




}