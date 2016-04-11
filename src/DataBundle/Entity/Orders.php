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
 * Orders
 */
class Orders
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var string
     */
    private $width;

    /**
     * @var string
     */
    private $height;

    /**
     * @var string
     */
    private $depth;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $status;

    /**
     * @var \DataBundle\Entity\Addresses
     */
    private $send;

    /**
     * @var \DataBundle\Entity\Addresses
     */
    private $to;


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
     * @return Orders
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
     * Set weight
     *
     * @param string $weight
     *
     * @return Orders
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set width
     *
     * @param string $width
     *
     * @return Orders
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return Orders
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set depth
     *
     * @param string $depth
     *
     * @return Orders
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return string
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Orders
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Orders
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set send
     *
     * @param \DataBundle\Entity\Addresses $send
     *
     * @return Orders
     */
    public function setSend(\DataBundle\Entity\Addresses $send = null)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Get send
     *
     * @return \DataBundle\Entity\Addresses
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Set to
     *
     * @param \DataBundle\Entity\Addresses $to
     *
     * @return Orders
     */
    public function setTo(\DataBundle\Entity\Addresses $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \DataBundle\Entity\Addresses
     */
    public function getTo()
    {
        return $this->to;
    }
    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;


    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Orders
     */
    public function setUsers(\DataBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \DataBundle\Entity\Users
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $parcels;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parcels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add parcel
     *
     * @param \DataBundle\Entity\Parcels $parcel
     *
     * @return Orders
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
}
