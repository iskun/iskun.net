<?php

namespace DataBundle\Entity;

/**
 * FacultiesTeachers
 */
class FacultiesTeachers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Faculties
     */
    private $faculties;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $facultiesteachersvalidate;


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
     * Set faculties
     *
     * @param \DataBundle\Entity\Faculties $faculties
     *
     * @return FacultiesTeachers
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
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return FacultiesTeachers
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
     * Set facultiesteachersvalidate
     *
     * @param \DataBundle\Entity\Users $facultiesteachersvalidate
     *
     * @return FacultiesTeachers
     */
    public function setFacultiesteachersvalidate(\DataBundle\Entity\Users $facultiesteachersvalidate = null)
    {
        $this->facultiesteachersvalidate = $facultiesteachersvalidate;

        return $this;
    }

    /**
     * Get facultiesteachersvalidate
     *
     * @return \DataBundle\Entity\Users
     */
    public function getFacultiesteachersvalidate()
    {
        return $this->facultiesteachersvalidate;
    }
}
