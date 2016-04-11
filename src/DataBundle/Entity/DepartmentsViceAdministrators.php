<?php

namespace DataBundle\Entity;

/**
 * DepartmentsViceAdministrators
 */
class DepartmentsViceAdministrators
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Departments
     */
    private $departments;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $departmentsviceadministratorsvalidate;


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
     * Set departments
     *
     * @param \DataBundle\Entity\Departments $departments
     *
     * @return DepartmentsViceAdministrators
     */
    public function setDepartments(\DataBundle\Entity\Departments $departments = null)
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * Get departments
     *
     * @return \DataBundle\Entity\Departments
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return DepartmentsViceAdministrators
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
     * Set departmentsviceadministratorsvalidate
     *
     * @param \DataBundle\Entity\Users $departmentsviceadministratorsvalidate
     *
     * @return DepartmentsViceAdministrators
     */
    public function setDepartmentsviceadministratorsvalidate(\DataBundle\Entity\Users $departmentsviceadministratorsvalidate = null)
    {
        $this->departmentsviceadministratorsvalidate = $departmentsviceadministratorsvalidate;

        return $this;
    }

    /**
     * Get departmentsviceadministratorsvalidate
     *
     * @return \DataBundle\Entity\Users
     */
    public function getDepartmentsviceadministratorsvalidate()
    {
        return $this->departmentsviceadministratorsvalidate;
    }
}
