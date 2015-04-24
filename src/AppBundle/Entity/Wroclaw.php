<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wroclaw
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Wroclaw
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="wroclaw", type="string", length=255)
     */
    private $wroclaw;

    /**
     * @var integer
     *
     * @ORM\Column(name="population", type="integer")
     */
    private $population;


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
     * Set wroclaw
     *
     * @param string $wroclaw
     * @return Wroclaw
     */
    public function setWroclaw($wroclaw)
    {
        $this->wroclaw = $wroclaw;

        return $this;
    }

    /**
     * Get wroclaw
     *
     * @return string 
     */
    public function getWroclaw()
    {
        return $this->wroclaw;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return Wroclaw
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }
}
