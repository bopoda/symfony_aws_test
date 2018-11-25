<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleRepository")
 */
class Sale
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $saleGroup = '';


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
     * Set name
     *
     * @param string $name
     *
     * @return Sale
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set saleGroup
     *
     * @param string $saleGroup
     *
     * @return Sale
     */
    public function setSaleGroup($saleGroup)
    {
        $this->saleGroup = $saleGroup;

        return $this;
    }

    /**
     * Get saleGroup
     *
     * @return string
     */
    public function getSaleGroup()
    {
        return $this->saleGroup;
    }
}

