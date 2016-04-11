<?php

namespace DataBundle\Entity;

/**
 * SchoolsTypes
 */
class SchoolsTypes
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
    private $description;

    /**
     * @var integer
     */
    private $orders;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schools;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolstypesgrades;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \DataBundle\Entity\SchoolsTypes
     */
    private $parent;

    /**
     * @var \DataBundle\Entity\Slugs
     */
    private $slugs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schools = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolstypesgrades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SchoolsTypes
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
     * Set description
     *
     * @param string $description
     *
     * @return SchoolsTypes
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set orders
     *
     * @param integer $orders
     *
     * @return SchoolsTypes
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return integer
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add school
     *
     * @param \DataBundle\Entity\Schools $school
     *
     * @return SchoolsTypes
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
     * Add schoolstypesgrade
     *
     * @param \DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade
     *
     * @return SchoolsTypes
     */
    public function addSchoolstypesgrade(\DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade)
    {
        $this->schoolstypesgrades[] = $schoolstypesgrade;

        return $this;
    }

    /**
     * Remove schoolstypesgrade
     *
     * @param \DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade
     */
    public function removeSchoolstypesgrade(\DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade)
    {
        $this->schoolstypesgrades->removeElement($schoolstypesgrade);
    }

    /**
     * Get schoolstypesgrades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolstypesgrades()
    {
        return $this->schoolstypesgrades;
    }

    /**
     * Add child
     *
     * @param \DataBundle\Entity\SchoolsTypes $child
     *
     * @return SchoolsTypes
     */
    public function addChild(\DataBundle\Entity\SchoolsTypes $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\SchoolsTypes $child
     */
    public function removeChild(\DataBundle\Entity\SchoolsTypes $child)
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
     * Set parent
     *
     * @param \DataBundle\Entity\SchoolsTypes $parent
     *
     * @return SchoolsTypes
     */
    public function setParent(\DataBundle\Entity\SchoolsTypes $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\SchoolsTypes
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set slugs
     *
     * @param \DataBundle\Entity\Slugs $slugs
     *
     * @return SchoolsTypes
     */
    public function setSlugs(\DataBundle\Entity\Slugs $slugs = null)
    {
        $this->slugs = $slugs;

        return $this;
    }

    /**
     * Get slugs
     *
     * @return \DataBundle\Entity\Slugs
     */
    public function getSlugs()
    {
        return $this->slugs;
    }
}
