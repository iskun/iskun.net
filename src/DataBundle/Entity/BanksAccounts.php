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
 * BanksAccounts
 */
class BanksAccounts
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
    private $card_number;

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $account_number;

    /**
     * @var \DataBundle\Entity\Banks
     * @Groups({"basic","full"})
     */
    private $banks;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;


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
     * Set cardNumber
     *
     * @param string $cardNumber
     *
     * @return BanksAccounts
     */
    public function setCardNumber($cardNumber)
    {
        $this->card_number = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->card_number;
    }

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     *
     * @return BanksAccounts
     */
    public function setAccountNumber($accountNumber)
    {
        $this->account_number = $accountNumber;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * Set banks
     *
     * @param \DataBundle\Entity\Banks $banks
     *
     * @return BanksAccounts
     */
    public function setBanks(\DataBundle\Entity\Banks $banks = null)
    {
        $this->banks = $banks;

        return $this;
    }

    /**
     * Get banks
     *
     * @return \DataBundle\Entity\Banks
     */
    public function getBanks()
    {
        return $this->banks;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return BanksAccounts
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
     * @var string
     * @Groups({"basic","full"})
     */
    private $name;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return BanksAccounts
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
     * @var integer
     * @Groups({"basic","full"})  
     */
    private $default;


    /**
     * Set default
     *
     * @param integer $default
     *
     * @return BanksAccounts
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Get default
     *
     * @return integer
     */
    public function getDefault()
    {
        return $this->default;
    }
    /**
     * @var string
     */
    private $active;


    /**
     * Set active
     *
     * @param string $active
     *
     * @return BanksAccounts
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * @var string
     * @Groups({"basic","full"})  
     */
    private $isdefault;


    /**
     * Set isdefault
     *
     * @param string $isdefault
     *
     * @return BanksAccounts
     */
    public function setIsdefault($isdefault)
    {
        $this->isdefault = $isdefault;

        return $this;
    }

    /**
     * Get isdefault
     *
     * @return string
     */
    public function getIsdefault()
    {
        return $this->isdefault;
    }
}
