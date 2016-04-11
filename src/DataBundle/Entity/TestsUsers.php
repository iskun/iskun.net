<?php

namespace DataBundle\Entity;

/**
 * TestsUsers
 */
class TestsUsers
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
     * @var \DataBundle\Entity\Tests
     */
    private $tests;

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
     * @return TestsUsers
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
     * @return TestsUsers
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
     * @return TestsUsers
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
     * @return TestsUsers
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
     * @return TestsUsers
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
     * Set tests
     *
     * @param \DataBundle\Entity\Tests $tests
     *
     * @return TestsUsers
     */
    public function setTests(\DataBundle\Entity\Tests $tests = null)
    {
        $this->tests = $tests;

        return $this;
    }

    /**
     * Get tests
     *
     * @return \DataBundle\Entity\Tests
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return TestsUsers
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
