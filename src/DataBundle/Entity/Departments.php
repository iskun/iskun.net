<?php

namespace DataBundle\Entity;

/**
 * Departments
 */
class Departments
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsteachers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsviceadministrators;

    /**
     * @var \DataBundle\Entity\Faculties
     */
    private $faculties;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $departmentsadministrator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departmentsteachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departmentsviceadministrators = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Departments
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
     * @return Departments
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
     * Add departmentsteacher
     *
     * @param \DataBundle\Entity\DepartmentsTeachers $departmentsteacher
     *
     * @return Departments
     */
    public function addDepartmentsteacher(\DataBundle\Entity\DepartmentsTeachers $departmentsteacher)
    {
        $this->departmentsteachers[] = $departmentsteacher;

        return $this;
    }

    /**
     * Remove departmentsteacher
     *
     * @param \DataBundle\Entity\DepartmentsTeachers $departmentsteacher
     */
    public function removeDepartmentsteacher(\DataBundle\Entity\DepartmentsTeachers $departmentsteacher)
    {
        $this->departmentsteachers->removeElement($departmentsteacher);
    }

    /**
     * Get departmentsteachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsteachers()
    {
        return $this->departmentsteachers;
    }

    /**
     * Add departmentsviceadministrator
     *
     * @param \DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator
     *
     * @return Departments
     */
    public function addDepartmentsviceadministrator(\DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator)
    {
        $this->departmentsviceadministrators[] = $departmentsviceadministrator;

        return $this;
    }

    /**
     * Remove departmentsviceadministrator
     *
     * @param \DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator
     */
    public function removeDepartmentsviceadministrator(\DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator)
    {
        $this->departmentsviceadministrators->removeElement($departmentsviceadministrator);
    }

    /**
     * Get departmentsviceadministrators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsviceadministrators()
    {
        return $this->departmentsviceadministrators;
    }

    /**
     * Set faculties
     *
     * @param \DataBundle\Entity\Faculties $faculties
     *
     * @return Departments
     */
    public function setFaculties(\DataBundle\Entity\Faculties $faculties = null)
    {
        $this->faculties = $faculties;

        return $this;
    }

    /**
     * Get faculties
     *
     * @return \DataBundle\Entity\Faculties
     */
    public function getFaculties()
    {
        return $this->faculties;
    }

    /**
     * Set departmentsadministrator
     *
     * @param \DataBundle\Entity\Users $departmentsadministrator
     *
     * @return Departments
     */
    public function setDepartmentsadministrator(\DataBundle\Entity\Users $departmentsadministrator = null)
    {
        $this->departmentsadministrator = $departmentsadministrator;

        return $this;
    }

    /**
     * Get departmentsadministrator
     *
     * @return \DataBundle\Entity\Users
     */
    public function getDepartmentsadministrator()
    {
        return $this->departmentsadministrator;
    }
}
