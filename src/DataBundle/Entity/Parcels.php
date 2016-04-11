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
 * Parcels
 */
class Parcels
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $name;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $weight;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $width;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $height;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $depth;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $note;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $status;

    /**
     * @var \DataBundle\Entity\Addresses
     * @Groups({"basic","full"}) 
     */
    private $send;

    /**
     * @var \DataBundle\Entity\Addresses
     * @Groups({"basic","full"}) 
     */
    private $to;

    /**
     * @var \DataBundle\Entity\Orders
     */
    private $orders;


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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * @return Parcels
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
     * Set orders
     *
     * @param \DataBundle\Entity\Orders $orders
     *
     * @return Parcels
     */
    public function setOrders(\DataBundle\Entity\Orders $orders = null)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return \DataBundle\Entity\Orders
     */
    public function getOrders()
    {
        return $this->orders;
    }
    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $price;


    /**
     * Set price
     *
     * @param string $price
     *
     * @return Parcels
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic","full"}) 
     */
    private $users;


    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Parcels
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
     * @var \DataBundle\Entity\Services
     * @Groups({"basic","full"}) 
     */
    private $services;


    /**
     * Set services
     *
     * @param \DataBundle\Entity\Services $services
     *
     * @return Parcels
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
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $delivery_time;


    /**
     * Set deliveryTime
     *
     * @param string $deliveryTime
     *
     * @return Parcels
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->delivery_time = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return string
     */
    public function getDeliveryTime()
    {
        return $this->delivery_time;
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
    private $collect_amount;


    /**
     * Set collect
     *
     * @param integer $collect
     *
     * @return Parcels
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
     * Set collectAmount
     *
     * @param integer $collectAmount
     *
     * @return Parcels
     */
    public function setCollectAmount($collectAmount)
    {
        $this->collect_amount = $collectAmount;

        return $this;
    }

    /**
     * Get collectAmount
     *
     * @return integer
     */
    public function getCollectAmount()
    {
        return $this->collect_amount;
    }
    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic","full"}) 
     */
    private $shipper;


    /**
     * Set shipper
     *
     * @param \DataBundle\Entity\Users $shipper
     *
     * @return Parcels
     */
    public function setShipper(\DataBundle\Entity\Users $shipper = null)
    {
        $this->shipper = $shipper;

        return $this;
    }

    /**
     * Get shipper
     *
     * @return \DataBundle\Entity\Users
     */
    public function getShipper()
    {
        return $this->shipper;
    }
    /**
     * @var \DataBundle\Entity\Users
     */
    private $shippers;


    /**
     * Set shippers
     *
     * @param \DataBundle\Entity\Users $shippers
     *
     * @return Parcels
     */
    public function setShippers(\DataBundle\Entity\Users $shippers = null)
    {
        $this->shippers = $shippers;

        return $this;
    }

    /**
     * Get shippers
     *
     * @return \DataBundle\Entity\Users
     */
    public function getShippers()
    {
        return $this->shippers;
    }
}
