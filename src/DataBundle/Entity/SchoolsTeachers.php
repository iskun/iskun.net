<?php

namespace DataBundle\Entity;

/**
 * SchoolsTeachers
 */
class SchoolsTeachers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $join_date;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $proof;

    /**
     * @var \DataBundle\Entity\Schools
     */
    private $schools;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;


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
     * @param string $status
     *
     * @return SchoolsTeachers
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set joinDate
     *
     * @param integer $joinDate
     *
     * @return SchoolsTeachers
     */
    public function setJoinDate($joinDate)
    {
        $this->join_date = $joinDate;

        return $this;
    }

    /**
     * Get joinDate
     *
     * @return integer
     */
    public function getJoinDate()
    {
        return $this->join_date;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return SchoolsTeachers
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set proof
     *
     * @param string $proof
     *
     * @return SchoolsTeachers
     */
    public function setProof($proof)
    {
        $this->proof = $proof;

        return $this;
    }

    /**
     * Get proof
     *
     * @return string
     */
    public function getProof()
    {
        return $this->proof;
    }

    /**
     * Set schools
     *
     * @param \DataBundle\Entity\Schools $schools
     *
     * @return SchoolsTeachers
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
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return SchoolsTeachers
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
}
