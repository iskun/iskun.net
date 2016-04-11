<?php

namespace DataBundle\Entity;

/**
 * Contests
 */
class Contests
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
     * @var integer
     */
    private $time;

    /**
     * @var integer
     */
    private $update_time;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contestsquestions;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Courses
     */
    private $courses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contestsquestions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Contests
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
     * Set time
     *
     * @param integer $time
     *
     * @return Contests
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set updateTime
     *
     * @param integer $updateTime
     *
     * @return Contests
     */
    public function setUpdateTime($updateTime)
    {
        $this->update_time = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return integer
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Add contestsquestion
     *
     * @param \DataBundle\Entity\ContestsQuestions $contestsquestion
     *
     * @return Contests
     */
    public function addContestsquestion(\DataBundle\Entity\ContestsQuestions $contestsquestion)
    {
        $this->contestsquestions[] = $contestsquestion;

        return $this;
    }

    /**
     * Remove contestsquestion
     *
     * @param \DataBundle\Entity\ContestsQuestions $contestsquestion
     */
    public function removeContestsquestion(\DataBundle\Entity\ContestsQuestions $contestsquestion)
    {
        $this->contestsquestions->removeElement($contestsquestion);
    }

    /**
     * Get contestsquestions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContestsquestions()
    {
        return $this->contestsquestions;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Contests
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
     * Set courses
     *
     * @param \DataBundle\Entity\Courses $courses
     *
     * @return Contests
     */
    public function setCourses(\DataBundle\Entity\Courses $courses = null)
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * Get courses
     *
     * @return \DataBundle\Entity\Courses
     */
    public function getCourses()
    {
        return $this->courses;
    }
}
