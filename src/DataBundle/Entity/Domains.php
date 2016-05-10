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
 * Domains
 */
class Domains
{
    /**
     * @var integer
     * @Groups({"basic"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"basic"})
     */
    private $name;

    /**
     * @var string
     * @Groups({"basic"})
     */
    private $address;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emailsaddresses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emailsaddresses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Domains
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
     * Set address
     *
     * @param string $address
     *
     * @return Domains
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add emailsaddress
     *
     * @param \DataBundle\Entity\EmailsAddresses $emailsaddress
     *
     * @return Domains
     */
    public function addEmailsaddress(\DataBundle\Entity\EmailsAddresses $emailsaddress)
    {
        $this->emailsaddresses[] = $emailsaddress;

        return $this;
    }

    /**
     * Remove emailsaddress
     *
     * @param \DataBundle\Entity\EmailsAddresses $emailsaddress
     */
    public function removeEmailsaddress(\DataBundle\Entity\EmailsAddresses $emailsaddress)
    {
        $this->emailsaddresses->removeElement($emailsaddress);
    }

    /**
     * Get emailsaddresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmailsaddresses()
    {
        return $this->emailsaddresses;
    }
}
