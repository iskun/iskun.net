<?php

namespace DataBundle\Entity;

/**
 * Locations
 */
class Locations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var integer
     */
    private $depth;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $code;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schools;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolsprovinces;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Locations
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schools = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolsprovinces = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Locations
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
     * @return Locations
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
     * Set type
     *
     * @param string $type
     *
     * @return Locations
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Locations
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Locations
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set depth
     *
     * @param integer $depth
     *
     * @return Locations
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return integer
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Locations
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Locations
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add child
     *
     * @param \DataBundle\Entity\Locations $child
     *
     * @return Locations
     */
    public function addChild(\DataBundle\Entity\Locations $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\Locations $child
     */
    public function removeChild(\DataBundle\Entity\Locations $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add school
     *
     * @param \DataBundle\Entity\Schools $school
     *
     * @return Locations
     */
    public function addSchool(\DataBundle\Entity\Schools $school)
    {
        $this->schools[] = $school;

        return $this;
    }

    /**
     * Remove school
     *
     * @param \DataBundle\Entity\Schools $school
     */
    public function removeSchool(\DataBundle\Entity\Schools $school)
    {
        $this->schools->removeElement($school);
    }

    /**
     * Get schools
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * Add schoolsprovince
     *
     * @param \DataBundle\Entity\Schools $schoolsprovince
     *
     * @return Locations
     */
    public function addSchoolsprovince(\DataBundle\Entity\Schools $schoolsprovince)
    {
        $this->schoolsprovinces[] = $schoolsprovince;

        return $this;
    }

    /**
     * Remove schoolsprovince
     *
     * @param \DataBundle\Entity\Schools $schoolsprovince
     */
    public function removeSchoolsprovince(\DataBundle\Entity\Schools $schoolsprovince)
    {
        $this->schoolsprovinces->removeElement($schoolsprovince);
    }

    /**
     * Get schoolsprovinces
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolsprovinces()
    {
        return $this->schoolsprovinces;
    }

    /**
     * Add user
     *
     * @param \DataBundle\Entity\Users $user
     *
     * @return Locations
     */
    public function addUser(\DataBundle\Entity\Users $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \DataBundle\Entity\Users $user
     */
    public function removeUser(\DataBundle\Entity\Users $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set parent
     *
     * @param \DataBundle\Entity\Locations $parent
     *
     * @return Locations
     */
    public function setParent(\DataBundle\Entity\Locations $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getParent()
    {
        return $this->parent;
    }
}
