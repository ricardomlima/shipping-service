<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Company;

/**
 * ShippingRange
 *
 * @ORM\Table(name="shipping_range")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShippingRangeRepository")
 */
class ShippingRange
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
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="shippingRanges")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $company;

    /**
     * @var int
     *
     * @ORM\Column(name="cep_from", type="integer")
     */
    private $cepFrom;

    /**
     * @var int
     *
     * @ORM\Column(name="cep_to", type="integer")
     */
    private $cepTo;

    /**
     * @var float
     *
     * @ORM\Column(name="price_kg", type="float")
     */
    private $priceKg;

    /**
     * @var float
     *
     * @ORM\Column(name="price_kg_additional", type="float")
     */
    private $priceKgAdditional;

    /**
     * @var int
     *
     * @ORM\Column(name="min_deadline", type="integer")
     */
    private $minDeadline;

    /**
     * @var int
     *
     * @ORM\Column(name="max_deadline", type="integer")
     */
    private $maxDeadline;

    /**
     * @var int
     *
     * @ORM\Column(name="extraday_overweight_trigger", type="integer")
     */
    private $extradayOverweightTrigger;

    /**
     * @var int
     *
     * @ORM\Column(name="price_overweight_limit", type="integer")
     */
    private $priceOverweightLimit;

    /**
     * @var int
     *
     * @ORM\Column(name="extraday_overweight_limit", type="integer")
     */
    private $extradayOverweightLimit;


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
     * Set Company
     *
     * @param AppBundle\Entity\Company $company
     *
     * @return ShippingRange
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get Company
     *
     * @return AppBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set cepFrom
     *
     * @param integer $cepFrom
     *
     * @return ShippingRange
     */
    public function setCepFrom($cepFrom)
    {
        $this->cepFrom = $cepFrom;

        return $this;
    }

    /**
     * Get cepFrom
     *
     * @return int
     */
    public function getCepFrom()
    {
        return $this->cepFrom;
    }

    /**
     * Set cepTo
     *
     * @param integer $cepTo
     *
     * @return ShippingRange
     */
    public function setCepTo($cepTo)
    {
        $this->cepTo = $cepTo;

        return $this;
    }

    /**
     * Get cepTo
     *
     * @return int
     */
    public function getCepTo()
    {
        return $this->cepTo;
    }

    /**
     * Set priceKg
     *
     * @param float $priceKg
     *
     * @return ShippingRange
     */
    public function setPriceKg($priceKg)
    {
        $this->priceKg = $priceKg;

        return $this;
    }

    /**
     * Get priceKg
     *
     * @return float
     */
    public function getPriceKg()
    {
        return $this->priceKg;
    }

    /**
     * Set priceKgAdditional
     *
     * @param float $priceKgAdditional
     *
     * @return ShippingRange
     */
    public function setPriceKgAdditional($priceKgAdditional)
    {
        $this->priceKgAdditional = $priceKgAdditional;

        return $this;
    }

    /**
     * Get priceKgAdditional
     *
     * @return float
     */
    public function getPriceKgAdditional()
    {
        return $this->priceKgAdditional;
    }

    /**
     * Set minDeadline
     *
     * @param integer $minDeadline
     *
     * @return ShippingRange
     */
    public function setMinDeadline($minDeadline)
    {
        $this->minDeadline = $minDeadline;

        return $this;
    }

    /**
     * Get minDeadline
     *
     * @return int
     */
    public function getMinDeadline()
    {
        return $this->minDeadline;
    }

    /**
     * Set maxDeadline
     *
     * @param integer $maxDeadline
     *
     * @return ShippingRange
     */
    public function setMaxDeadline($maxDeadline)
    {
        $this->maxDeadline = $maxDeadline;

        return $this;
    }

    /**
     * Get maxDeadline
     *
     * @return int
     */
    public function getMaxDeadline()
    {
        return $this->maxDeadline;
    }

    /**
     * Set extradayOverweightTrigger
     *
     * @param integer $extradayOverweightTrigger
     *
     * @return ShippingRange
     */
    public function setExtradayOverweightTrigger($extradayOverweightTrigger)
    {
        $this->extradayOverweightTrigger = $extradayOverweightTrigger;

        return $this;
    }

    /**
     * Get extradayOverweightTrigger
     *
     * @return int
     */
    public function getExtradayOverweightTrigger()
    {
        return $this->extradayOverweightTrigger;
    }

    /**
     * Set priceOverweightLimit
     *
     * @param integer $priceOverweightLimit
     *
     * @return ShippingRange
     */
    public function setPriceOverweightLimit($priceOverweightLimit)
    {
        $this->priceOverweightLimit = $priceOverweightLimit;

        return $this;
    }

    /**
     * Get priceOverweightLimit
     *
     * @return int
     */
    public function getPriceOverweightLimit()
    {
        return $this->priceOverweightLimit;
    }

    /**
     * Set extradayOverweightLimit
     *
     * @param integer $extradayOverweightLimit
     *
     * @return ShippingRange
     */
    public function setExtradayOverweightLimit($extradayOverweightLimit)
    {
        $this->extradayOverweightLimit = $extradayOverweightLimit;

        return $this;
    }

    /**
     * Get extradayOverweightLimit
     *
     * @return int
     */
    public function getExtradayOverweightLimit()
    {
        return $this->extradayOverweightLimit;
    }

    /**
     * Add Company for reverse ownership
     *
     * @return void
     */
    public function addCompany(Company $company)
    {
        if(!$this->company->contains($company)){
            $this->company->add($company);
        }
    }
}

