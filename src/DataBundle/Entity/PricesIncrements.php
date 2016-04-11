<?php

namespace DataBundle\Entity;
use JMS\Serializer\Annotation\AccessType;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\MaxDepth;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
/**
 * PricesIncrements
 */
class PricesIncrements
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $block;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $price;

    /**
     * @var \DataBundle\Entity\Locations
     * @Groups({"basic","full"}) 
     */
    private $pickuplocations;

    /**
     * @var \DataBundle\Entity\Locations
     * @Groups({"basic","full"}) 
     */
    private $deliverylocations;


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
     * Set block
     *
     * @param integer $block
     *
     * @return PricesIncrements
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return integer
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return PricesIncrements
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set pickuplocations
     *
     * @param \DataBundle\Entity\Locations $pickuplocations
     *
     * @return PricesIncrements
     */
    public function setPickuplocations(\DataBundle\Entity\Locations $pickuplocations = null)
    {
        $this->pickuplocations = $pickuplocations;

        return $this;
    }

    /**
     * Get pickuplocations
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getPickuplocations()
    {
        return $this->pickuplocations;
    }

    /**
     * Set deliverylocations
     *
     * @param \DataBundle\Entity\Locations $deliverylocations
     *
     * @return PricesIncrements
     */
    public function setDeliverylocations(\DataBundle\Entity\Locations $deliverylocations = null)
    {
        $this->deliverylocations = $deliverylocations;

        return $this;
    }

    /**
     * Get deliverylocations
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getDeliverylocations()
    {
        return $this->deliverylocations;
    }
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $collect;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $alarm;


    /**
     * Set collect
     *
     * @param integer $collect
     *
     * @return PricesIncrements
     */
    public function setCollect($collect)
    {
        $this->collect = $collect;

        return $this;
    }

    /**
     * Get collect
     *
     * @return integer
     */
    public function getCollect()
    {
        return $this->collect;
    }

    /**
     * Set alarm
     *
     * @param integer $alarm
     *
     * @return PricesIncrements
     */
    public function setAlarm($alarm)
    {
        $this->alarm = $alarm;

        return $this;
    }

    /**
     * Get alarm
     *
     * @return integer
     */
    public function getAlarm()
    {
        return $this->alarm;
    }
}
