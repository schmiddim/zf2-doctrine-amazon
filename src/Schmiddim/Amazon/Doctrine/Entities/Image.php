<?php


namespace Schmiddim\Amazon\Doctrine\Entities;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Image
{
    const SIZE_SMALL = 'small';

    const SIZE_MEDIUM = 'medium';

    const SIZE_LARGE = 'large';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @ORM\Column(type="string")
     */
    protected $type;
    /**
     * @ORM\Column(type="string")
     */
    protected $url;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $width;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $height;

    /**
     * Image constructor.
     * @param $url
     * @param $type
     * @param $width
     * @param $height
     */
    public function __construct($url, $type, $width, $height)
    {
        $this->setUrl((string)$url);
        $this->setType($type);
        $this->setWidth((int)$width);
        $this->setHeight((int)$height);
    }

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}