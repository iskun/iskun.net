<?php

namespace DataBundle\Entity;

/**
 * ReportComments
 */
class ReportComments
{
    /**
     * @var integer
     */
    private $rid;

    /**
     * @var string
     */
    private $rreason;

    /**
     * @var string
     */
    private $rstatus;

    /**
     * @var string
     */
    private $rresponse;

    /**
     * @var integer
     */
    private $rtime;

    /**
     * @var string
     */
    private $rip;

    /**
     * @var \DataBundle\Entity\Comments
     */
    private $comments;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;


    /**
     * Get rid
     *
     * @return integer
     */
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * Set rreason
     *
     * @param string $rreason
     *
     * @return ReportComments
     */
    public function setRreason($rreason)
    {
        $this->rreason = $rreason;

        return $this;
    }

    /**
     * Get rreason
     *
     * @return string
     */
    public function getRreason()
    {
        return $this->rreason;
    }

    /**
     * Set rstatus
     *
     * @param string $rstatus
     *
     * @return ReportComments
     */
    public function setRstatus($rstatus)
    {
        $this->rstatus = $rstatus;

        return $this;
    }

    /**
     * Get rstatus
     *
     * @return string
     */
    public function getRstatus()
    {
        return $this->rstatus;
    }

    /**
     * Set rresponse
     *
     * @param string $rresponse
     *
     * @return ReportComments
     */
    public function setRresponse($rresponse)
    {
        $this->rresponse = $rresponse;

        return $this;
    }

    /**
     * Get rresponse
     *
     * @return string
     */
    public function getRresponse()
    {
        return $this->rresponse;
    }

    /**
     * Set rtime
     *
     * @param integer $rtime
     *
     * @return ReportComments
     */
    public function setRtime($rtime)
    {
        $this->rtime = $rtime;

        return $this;
    }

    /**
     * Get rtime
     *
     * @return integer
     */
    public function getRtime()
    {
        return $this->rtime;
    }

    /**
     * Set rip
     *
     * @param string $rip
     *
     * @return ReportComments
     */
    public function setRip($rip)
    {
        $this->rip = $rip;

        return $this;
    }

    /**
     * Get rip
     *
     * @return string
     */
    public function getRip()
    {
        return $this->rip;
    }

    /**
     * Set comments
     *
     * @param \DataBundle\Entity\Comments $comments
     *
     * @return ReportComments
     */
    public function setComments(\DataBundle\Entity\Comments $comments = null)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return \DataBundle\Entity\Comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return ReportComments
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
