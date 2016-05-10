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
 * EmailsAddresses
 */
class EmailsAddresses
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
    private $address;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emails;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Domains
     * @Groups({"basic"})
     */
    private $domains;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set address
     *
     * @param string $address
     *
     * @return EmailsAddresses
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
     * Add email
     *
     * @param \DataBundle\Entity\Emails $email
     *
     * @return EmailsAddresses
     */
    public function addEmail(\DataBundle\Entity\Emails $email)
    {
        $this->emails[] = $email;

        return $this;
    }

    /**
     * Remove email
     *
     * @param \DataBundle\Entity\Emails $email
     */
    public function removeEmail(\DataBundle\Entity\Emails $email)
    {
        $this->emails->removeElement($email);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return EmailsAddresses
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
     * Set domains
     *
     * @param \DataBundle\Entity\Domains $domains
     *
     * @return EmailsAddresses
     */
    public function setDomains(\DataBundle\Entity\Domains $domains = null)
    {
        $this->domains = $domains;

        return $this;
    }

    /**
     * Get domains
     *
     * @return \DataBundle\Entity\Domains
     */
    public function getDomains()
    {
        return $this->domains;
    }
}

