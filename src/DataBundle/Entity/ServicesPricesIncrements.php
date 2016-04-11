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
 * ServicesPricesIncrements
 */
class ServicesPricesIncrements
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
    private $increase;

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
     * Set increase
     *
     * @param integer $increase
     *
     * @return ServicesPricesIncrements
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
     * Set pickuplocations
     *
     * @param \DataBundle\Entity\Locations $pickuplocations
     *
     * @return ServicesPricesIncrements
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
     * @return ServicesPricesIncrements
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
     * @var \DataBundle\Entity\Services
     * @Groups({"basic","full"}) 
     */
    private $services;


    /**
     * Set services
     *
     * @param \DataBundle\Entity\Services $services
     *
     * @return ServicesPricesIncrements
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
}
