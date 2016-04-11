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
 * Prices
 */
class Prices
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
    private $pickup;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $delivering;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $increase;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $parcels;

    /**
     * @var \DataBundle\Entity\Services
     * @Groups({"basic","full"}) 
     */
    private $services;

    /**
     * @var \DataBundle\Entity\LocationsTypes
     * @Groups({"basic","full"}) 
     */
    private $locationstypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parcels = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set pickup
     *
     * @param integer $pickup
     *
     * @return Prices
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;

        return $this;
    }

    /**
     * Get pickup
     *
     * @return integer
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * Set delivering
     *
     * @param integer $delivering
     *
     * @return Prices
     */
    public function setDelivering($delivering)
    {
        $this->delivering = $delivering;

        return $this;
    }

    /**
     * Get delivering
     *
     * @return integer
     */
    public function getDelivering()
    {
        return $this->delivering;
    }

    /**
     * Set increase
     *
     * @param integer $increase
     *
     * @return Prices
     */
    public function setIncrease($increase)
    {
        $this->increase = $increase;

        return $this;
    }

    /**
     * Get increase
     *
     * @return integer
     */
    public function getIncrease()
    {
        return $this->increase;
    }

    /**
     * Add parcel
     *
     * @param \DataBundle\Entity\Parcels $parcel
     *
     * @return Prices
     */
    public function addParcel(\DataBundle\Entity\Parcels $parcel)
    {
        $this->parcels[] = $parcel;

        return $this;
    }

    /**
     * Remove parcel
     *
     * @param \DataBundle\Entity\Parcels $parcel
     */
    public function removeParcel(\DataBundle\Entity\Parcels $parcel)
    {
        $this->parcels->removeElement($parcel);
    }

    /**
     * Get parcels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParcels()
    {
        return $this->parcels;
    }

    /**
     * Set services
     *
     * @param \DataBundle\Entity\Services $services
     *
     * @return Prices
     */
    public function setServices(\DataBundle\Entity\Services $services = null)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return \DataBundle\Entity\Services
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set locationstypes
     *
     * @param \DataBundle\Entity\LocationsTypes $locationstypes
     *
     * @return Prices
     */
    public function setLocationstypes(\DataBundle\Entity\LocationsTypes $locationstypes = null)
    {
        $this->locationstypes = $locationstypes;

        return $this;
    }

    /**
     * Get locationstypes
     *
     * @return \DataBundle\Entity\LocationsTypes
     */
    public function getLocationstypes()
    {
        return $this->locationstypes;
    }
    /**
     * @var string
     * @Groups({"basic","full"})  
     */
    private $type;


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Prices
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $delivery;


    /**
     * Set delivery
     *
     * @param integer $delivery
     *
     * @return Prices
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return integer
     */
    public function getDelivery()
    {
        return $this->delivery;
    }
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $from;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $to;

    /**
     * @var integer 
     * @Groups({"basic","full"}) 
     */
    private $price;

    /**
     * @var \DataBundle\Entity\Locations
     * @Groups({"basic","full"}) 
     */
    private $locations;


    /**
     * Set from
     *
     * @param integer $from
     *
     * @return Prices
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return integer
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param integer $to
     *
     * @return Prices
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return integer
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Prices
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
     * Set locations
     *
     * @param \DataBundle\Entity\Locations $locations
     *
     * @return Prices
     */
    public function setLocations(\DataBundle\Entity\Locations $locations = null)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Get locations
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getLocations()
    {
        return $this->locations;
    }
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $min;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $max;


    /**
     * Set min
     *
     * @param integer $min
     *
     * @return Prices
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min
     *
     * @return integer
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max
     *
     * @param integer $max
     *
     * @return Prices
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return integer
     */
    public function getMax()
    {
        return $this->max;
    }
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
     * Set pickuplocations
     *
     * @param \DataBundle\Entity\Locations $pickuplocations
     *
     * @return Prices
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
     * @return Prices
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
}
