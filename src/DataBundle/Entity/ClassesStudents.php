<?php

namespace DataBundle\Entity;

/**
 * ClassesStudents
 */
class ClassesStudents
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
     * @var string
     */
    private $role;

    /**
     * @var \DataBundle\Entity\Classes
     */
    private $classesstudents;


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
     * @return ClassesStudents
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
     * Set role
     *
     * @param string $role
     *
     * @return ClassesStudents
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
     * Set classesstudents
     *
     * @param \DataBundle\Entity\Classes $classesstudents
     *
     * @return ClassesStudents
     */
    public function setClassesstudents(\DataBundle\Entity\Classes $classesstudents = null)
    {
        $this->classesstudents = $classesstudents;

        return $this;
    }

    /**
     * Get classesstudents
     *
     * @return \DataBundle\Entity\Classes
     */
    public function getClassesstudents()
    {
        return $this->classesstudents;
    }
}
