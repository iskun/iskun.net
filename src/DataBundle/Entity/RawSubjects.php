<?php

namespace DataBundle\Entity;

/**
 * RawSubjects
 */
class RawSubjects
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $s_id;

    /**
     * @var string
     */
    private $s_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commentsfiles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentsfiles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set sId
     *
     * @param integer $sId
     *
     * @return RawSubjects
     */
    public function setSId($sId)
    {
        $this->s_id = $sId;

        return $this;
    }

    /**
     * Get sId
     *
     * @return integer
     */
    public function getSId()
    {
        return $this->s_id;
    }

    /**
     * Set sName
     *
     * @param string $sName
     *
     * @return RawSubjects
     */
    public function setSName($sName)
    {
        $this->s_name = $sName;

        return $this;
    }

    /**
     * Get sName
     *
     * @return string
     */
    public function getSName()
    {
        return $this->s_name;
    }

    /**
     * Add commentsfile
     *
     * @param \DataBundle\Entity\CommentsFiles $commentsfile
     *
     * @return RawSubjects
     */
    public function addCommentsfile(\DataBundle\Entity\CommentsFiles $commentsfile)
    {
        $this->commentsfiles[] = $commentsfile;

        return $this;
    }

    /**
     * Remove commentsfile
     *
     * @param \DataBundle\Entity\CommentsFiles $commentsfile
     */
    public function removeCommentsfile(\DataBundle\Entity\CommentsFiles $commentsfile)
    {
        $this->commentsfiles->removeElement($commentsfile);
    }

    /**
     * Get commentsfiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentsfiles()
    {
        return $this->commentsfiles;
    }
}
