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
 * Users
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $token;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $fullname;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $gender;

    /**
     * @var string
     */
    private $username;

    /**
     * @var boolean
     */
    private $is_active;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $email = '';

    /**
     * @var string
     */
    private $create_time;

    /**
     * @var string
     * @Groups({"basic","full"})   
     */ 
    private $type; 

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $tel = '';

    /**
     * @var integer
     */
    private $tel_status = 0;

    /**
     * @var integer
     */
    private $email_status = 0;

    /**
     * @var integer
     */
    private $active = 0;

    /**
     * @var integer
     */
    private $lastlogin = 0;

    /**
     * @var integer
     */
    private $balance = 0;

    /**
     * @var string
     */
    private $avatar = '';

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var integer
     */
    private $last_request;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DataBundle\Entity\Locations
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
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Users
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Users
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Users
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Users
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createTime
     *
     * @param string $createTime
     *
     * @return Users
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Users
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
     * Set tel
     *
     * @param string $tel
     *
     * @return Users
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set telStatus
     *
     * @param integer $telStatus
     *
     * @return Users
     */
    public function setTelStatus($telStatus)
    {
        $this->tel_status = $telStatus;

        return $this;
    }

    /**
     * Get telStatus
     *
     * @return integer
     */
    public function getTelStatus()
    {
        return $this->tel_status;
    }

    /**
     * Set emailStatus
     *
     * @param integer $emailStatus
     *
     * @return Users
     */
    public function setEmailStatus($emailStatus)
    {
        $this->email_status = $emailStatus;

        return $this;
    }

    /**
     * Get emailStatus
     *
     * @return integer
     */
    public function getEmailStatus()
    {
        return $this->email_status;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set lastlogin
     *
     * @param integer $lastlogin
     *
     * @return Users
     */
    public function setLastlogin($lastlogin)
    {
        $this->lastlogin = $lastlogin;

        return $this;
    }

    /**
     * Get lastlogin
     *
     * @return integer
     */
    public function getLastlogin()
    {
        return $this->lastlogin;
    }

    /**
     * Set balance
     *
     * @param integer $balance
     *
     * @return Users
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return integer
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Users
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Users
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set lastRequest
     *
     * @param integer $lastRequest
     *
     * @return Users
     */
    public function setLastRequest($lastRequest)
    {
        $this->last_request = $lastRequest;

        return $this;
    }

    /**
     * Get lastRequest
     *
     * @return integer
     */
    public function getLastRequest()
    {
        return $this->last_request;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Users
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set locations
     *
     * @param \DataBundle\Entity\Locations $locations
     *
     * @return Users
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
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function getRoles()
    {
        $roles[0]="ROLE_USER";
        return $roles;
    }

    public function eraseCredentials()
    {
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $name;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $latitude;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $longitude;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Users
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
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Users
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Users
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $address;


    /**
     * Set address
     *
     * @param string $address
     *
     * @return Users
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
     * @var string
     */
    private $time;


    /**
     * Set time
     *
     * @param string $time
     *
     * @return Users
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $addresses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add address
     *
     * @param \DataBundle\Entity\Addresses $address
     *
     * @return Users
     */
    public function addAddress(\DataBundle\Entity\Addresses $address)
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \DataBundle\Entity\Addresses $address
     */
    public function removeAddress(\DataBundle\Entity\Addresses $address)
    {
        $this->addresses->removeElement($address);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     */
    private $parcels;


    /**
     * Add parcel
     *
     * @param \DataBundle\Entity\Parcels $parcel
     *
     * @return Users
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
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $banksaccounts;


    /**
     * Add banksaccount
     *
     * @param \DataBundle\Entity\BanksAccounts $banksaccount
     *
     * @return Users
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
    /**
     * @var integer
     * @Groups({"basic","full"})
     */
    private $is_owner;


    /**
     * Set isOwner
     *
     * @param integer $isOwner
     *
     * @return Users
     */
    public function setIsOwner($isOwner)
    {
        $this->is_owner = $isOwner;

        return $this;
    }

    /**
     * Get isOwner
     *
     * @return integer
     */
    public function getIsOwner()
    {
        return $this->is_owner;
    }
}
