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
 * LocationsTypesAddPrices
 */
class LocationsTypesAddPrices
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
     * @var \DataBundle\Entity\LocationsTypes
     * @Groups({"basic","full"}) 
     */
    private $locationstypes;

    /**
     * @var \DataBundle\Entity\Locations
     * @Groups({"basic","full"}) 
     */
    private $locations;


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
     * @return LocationsTypesAddPrices
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
     * Set locationstypes
     *
     * @param \DataBundle\Entity\LocationsTypes $locationstypes
     *
     * @return LocationsTypesAddPrices
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
     * Set locations
     *
     * @param \DataBundle\Entity\Locations $locations
     *
     * @return LocationsTypesAddPrices
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
}

