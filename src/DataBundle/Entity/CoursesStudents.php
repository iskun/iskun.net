<?php

namespace DataBundle\Entity;

/**
 * CoursesStudents
 */
class CoursesStudents
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
     * @var \DataBundle\Entity\Courses
     */
    private $coursesstudents;


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
     * @return CoursesStudents
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
     * @return CoursesStudents
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
     * @return CoursesStudents
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
     * Set coursesstudents
     *
     * @param \DataBundle\Entity\Courses $coursesstudents
     *
     * @return CoursesStudents
     */
    public function setCoursesstudents(\DataBundle\Entity\Courses $coursesstudents = null)
    {
        $this->coursesstudents = $coursesstudents;

        return $this;
    }

    /**
     * Get coursesstudents
     *
     * @return \DataBundle\Entity\Courses
     */
    public function getCoursesstudents()
    {
        return $this->coursesstudents;
    }
}
