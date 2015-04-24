<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Czechoslovakia
 */
class Czechoslovakia
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $czechoslovakia;

    /**
     * @var string
     */
    private $caption;

    /**
     * @var integer
     */
    private $size;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set czechoslovakia
     *
     * @param string $czechoslovakia
     * @return Czechoslovakia
     */
    public function setCzechoslovakia($czechoslovakia)
    {
        $this->czechoslovakia = $czechoslovakia;

        return $this;
    }

    /**
     * Get czechoslovakia
     *
     * @return string 
     */
    public function getCzechoslovakia()
    {
        return $this->czechoslovakia;
    }

    /**
     * Set caption
     *
     * @param string $caption
     * @return Czechoslovakia
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return Czechoslovakia
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }
}
