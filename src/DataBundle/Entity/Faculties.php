<?php

namespace DataBundle\Entity;

/**
 * Faculties
 */
class Faculties
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
    private $office;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesteachers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesviceadministrators;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesdepartments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesclasses;

    /**
     * @var \DataBundle\Entity\Schools
     */
    private $schools;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $facultiesadministrator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facultiesteachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesviceadministrators = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesdepartments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesclasses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Faculties
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
     * Set office
     *
     * @param string $office
     *
     * @return Faculties
     */
    public function setOffice($office)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * Get office
     *
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Faculties
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
     * Add facultiesteacher
     *
     * @param \DataBundle\Entity\FacultiesTeachers $facultiesteacher
     *
     * @return Faculties
     */
    public function addFacultiesteacher(\DataBundle\Entity\FacultiesTeachers $facultiesteacher)
    {
        $this->facultiesteachers[] = $facultiesteacher;

        return $this;
    }

    /**
     * Remove facultiesteacher
     *
     * @param \DataBundle\Entity\FacultiesTeachers $facultiesteacher
     */
    public function removeFacultiesteacher(\DataBundle\Entity\FacultiesTeachers $facultiesteacher)
    {
        $this->facultiesteachers->removeElement($facultiesteacher);
    }

    /**
     * Get facultiesteachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesteachers()
    {
        return $this->facultiesteachers;
    }

    /**
     * Add facultiesviceadministrator
     *
     * @param \DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator
     *
     * @return Faculties
     */
    public function addFacultiesviceadministrator(\DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator)
    {
        $this->facultiesviceadministrators[] = $facultiesviceadministrator;

        return $this;
    }

    /**
     * Remove facultiesviceadministrator
     *
     * @param \DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator
     */
    public function removeFacultiesviceadministrator(\DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator)
    {
        $this->facultiesviceadministrators->removeElement($facultiesviceadministrator);
    }

    /**
     * Get facultiesviceadministrators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesviceadministrators()
    {
        return $this->facultiesviceadministrators;
    }

    /**
     * Add facultiesdepartment
     *
     * @param \DataBundle\Entity\Departments $facultiesdepartment
     *
     * @return Faculties
     */
    public function addFacultiesdepartment(\DataBundle\Entity\Departments $facultiesdepartment)
    {
        $this->facultiesdepartments[] = $facultiesdepartment;

        return $this;
    }

    /**
     * Remove facultiesdepartment
     *
     * @param \DataBundle\Entity\Departments $facultiesdepartment
     */
    public function removeFacultiesdepartment(\DataBundle\Entity\Departments $facultiesdepartment)
    {
        $this->facultiesdepartments->removeElement($facultiesdepartment);
    }

    /**
     * Get facultiesdepartments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesdepartments()
    {
        return $this->facultiesdepartments;
    }

    /**
     * Add facultiesclass
     *
     * @param \DataBundle\Entity\FacultiesClasses $facultiesclass
     *
     * @return Faculties
     */
    public function addFacultiesclass(\DataBundle\Entity\FacultiesClasses $facultiesclass)
    {
        $this->facultiesclasses[] = $facultiesclass;

        return $this;
    }

    /**
     * Remove facultiesclass
     *
     * @param \DataBundle\Entity\FacultiesClasses $facultiesclass
     */
    public function removeFacultiesclass(\DataBundle\Entity\FacultiesClasses $facultiesclass)
    {
        $this->facultiesclasses->removeElement($facultiesclass);
    }

    /**
     * Get facultiesclasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesclasses()
    {
        return $this->facultiesclasses;
    }

    /**
     * Set schools
     *
     * @param \DataBundle\Entity\Schools $schools
     *
     * @return Faculties
     */
    public function setSchools(\DataBundle\Entity\Schools $schools = null)
    {
        $this->schools = $schools;

        return $this;
    }

    /**
     * Get schools
     *
     * @return \DataBundle\Entity\Schools
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * Set facultiesadministrator
     *
     * @param \DataBundle\Entity\Users $facultiesadministrator
     *
     * @return Faculties
     */
    public function setFacultiesadministrator(\DataBundle\Entity\Users $facultiesadministrator = null)
    {
        $this->facultiesadministrator = $facultiesadministrator;

        return $this;
    }

    /**
     * Get facultiesadministrator
     *
     * @return \DataBundle\Entity\Users
     */
    public function getFacultiesadministrator()
    {
        return $this->facultiesadministrator;
    }
}
