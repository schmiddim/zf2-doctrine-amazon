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
     * @ORM\Column(type="string")
     */
    protected $asin;


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



}