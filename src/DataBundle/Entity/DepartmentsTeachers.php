<?php

namespace DataBundle\Entity;

/**
 * DepartmentsTeachers
 */
class DepartmentsTeachers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $status;

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
    private $departmentsteachersvalidate;


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
     * Set status
     *
     * @param integer $status
     *
     * @return DepartmentsTeachers
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set departments
     *
     * @param \DataBundle\Entity\Departments $departments
     *
     * @return DepartmentsTeachers
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
     * @return DepartmentsTeachers
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
     * Set departmentsteachersvalidate
     *
     * @param \DataBundle\Entity\Users $departmentsteachersvalidate
     *
     * @return DepartmentsTeachers
     */
    public function setDepartmentsteachersvalidate(\DataBundle\Entity\Users $departmentsteachersvalidate = null)
    {
        $this->departmentsteachersvalidate = $departmentsteachersvalidate;

        return $this;
    }

    /**
     * Get departmentsteachersvalidate
     *
     * @return \DataBundle\Entity\Users
     */
    public function getDepartmentsteachersvalidate()
    {
        return $this->departmentsteachersvalidate;
    }
}
