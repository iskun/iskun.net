<?php

namespace DataBundle\Entity;

/**
 * PostsTestsUsers
 */
class PostsTestsUsers
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
    private $start_time;

    /**
     * @var integer
     */
    private $end_time;

    /**
     * @var integer
     */
    private $mark;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var \DataBundle\Entity\PostsTests
     */
    private $poststests;

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
     * @return PostsTestsUsers
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
     * Set startTime
     *
     * @param integer $startTime
     *
     * @return PostsTestsUsers
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return integer
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set endTime
     *
     * @param integer $endTime
     *
     * @return PostsTestsUsers
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return integer
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set mark
     *
     * @param integer $mark
     *
     * @return PostsTestsUsers
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return integer
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return PostsTestsUsers
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set poststests
     *
     * @param \DataBundle\Entity\PostsTests $poststests
     *
     * @return PostsTestsUsers
     */
    public function setPoststests(\DataBundle\Entity\PostsTests $poststests = null)
    {
        $this->poststests = $poststests;

        return $this;
    }

    /**
     * Get poststests
     *
     * @return \DataBundle\Entity\PostsTests
     */
    public function getPoststests()
    {
        return $this->poststests;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return PostsTestsUsers
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
