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
 * Slugs
 */
class Slugs
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
    private $slug;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $entity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schools;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolstypes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schools = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolstypes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Slugs
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set entity
     *
     * @param string $entity
     *
     * @return Slugs
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Add school
     *
     * @param \DataBundle\Entity\Schools $school
     *
     * @return Slugs
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
     * Add schoolstype
     *
     * @param \DataBundle\Entity\SchoolsTypes $schoolstype
     *
     * @return Slugs
     */
    public function addSchoolstype(\DataBundle\Entity\SchoolsTypes $schoolstype)
    {
        $this->schoolstypes[] = $schoolstype;

        return $this;
    }

    /**
     * Remove schoolstype
     *
     * @param \DataBundle\Entity\SchoolsTypes $schoolstype
     */
    public function removeSchoolstype(\DataBundle\Entity\SchoolsTypes $schoolstype)
    {
        $this->schoolstypes->removeElement($schoolstype);
    }

    /**
     * Get schoolstypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolstypes()
    {
        return $this->schoolstypes;
    }

    /**
     * Add user
     *
     * @param \DataBundle\Entity\Users $user
     *
     * @return Slugs
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
}
