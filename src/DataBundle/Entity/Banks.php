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
 * Banks
 */
class Banks
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $banksaccounts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->banksaccounts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Banks
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
     * Add banksaccount
     *
     * @param \DataBundle\Entity\BanksAccounts $banksaccount
     *
     * @return Banks
     */
    public function addBanksaccount(\DataBundle\Entity\BanksAccounts $banksaccount)
    {
        $this->banksaccounts[] = $banksaccount;

        return $this;
    }

    /**
     * Remove banksaccount
     *
     * @param \DataBundle\Entity\BanksAccounts $banksaccount
     */
    public function removeBanksaccount(\DataBundle\Entity\BanksAccounts $banksaccount)
    {
        $this->banksaccounts->removeElement($banksaccount);
    }

    /**
     * Get banksaccounts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBanksaccounts()
    {
        return $this->banksaccounts;
    }
}

