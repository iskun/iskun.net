<?php

namespace DataBundle\Entity;

/**
 * FacultiesViceAdministrators
 */
class FacultiesViceAdministrators
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
    private $facultiesviceadministratorsvalidate;


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
     * @return FacultiesViceAdministrators
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
     * @return FacultiesViceAdministrators
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
     * Set facultiesviceadministratorsvalidate
     *
     * @param \DataBundle\Entity\Users $facultiesviceadministratorsvalidate
     *
     * @return FacultiesViceAdministrators
     */
    public function setFacultiesviceadministratorsvalidate(\DataBundle\Entity\Users $facultiesviceadministratorsvalidate = null)
    {
        $this->facultiesviceadministratorsvalidate = $facultiesviceadministratorsvalidate;

        return $this;
    }

    /**
     * Get facultiesviceadministratorsvalidate
     *
     * @return \DataBundle\Entity\Users
     */
    public function getFacultiesviceadministratorsvalidate()
    {
        return $this->facultiesviceadministratorsvalidate;
    }
}
