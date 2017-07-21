<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="ShippingRange", mappedBy="company", cascade={"persist", "remove"})
     * 
     */
    public $shippingRanges;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    public function __construct()
    {
        $this->shippingRanges = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
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
     * @return Company
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
     * Get Shipping Ranges
     *
     * @return string
     */
    public function getShippingRanges()
    {
        return $this->shippingRanges;
    }

    public function __toString(){
        return $this->name;
    }

    /**
     * Add Shipping Range through entity
     *
     * @return void
     */
    public function addShippingRange(ShippingRange $shippingRange)
    {
        $shippingRange->setCompany($this);
        $this->shippingRanges->add($shippingRange);
    }

    /**
     * Remove Shipping Range through entity
     *
     * @return void
     */
    public function removeShippingRange(ShippingRange $shippingRange)
    {
        $this->shippingRanges->removeElement($shippingRange);
    }
}

