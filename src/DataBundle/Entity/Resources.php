<?php

namespace DataBundle\Entity;

/**
 * Resources
 */
class Resources
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $title_strip;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $description_strip;

    /**
     * @var integer
     */
    private $uploadtime;

    /**
     * @var integer
     */
    private $downloads;

    /**
     * @var integer
     */
    private $comments;

    /**
     * @var integer
     */
    private $like;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $userid;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $resourcesfiles;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resourcesfiles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Resources
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set titleStrip
     *
     * @param string $titleStrip
     *
     * @return Resources
     */
    public function setTitleStrip($titleStrip)
    {
        $this->title_strip = $titleStrip;

        return $this;
    }

    /**
     * Get titleStrip
     *
     * @return string
     */
    public function getTitleStrip()
    {
        return $this->title_strip;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Resources
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set descriptionStrip
     *
     * @param string $descriptionStrip
     *
     * @return Resources
     */
    public function setDescriptionStrip($descriptionStrip)
    {
        $this->description_strip = $descriptionStrip;

        return $this;
    }

    /**
     * Get descriptionStrip
     *
     * @return string
     */
    public function getDescriptionStrip()
    {
        return $this->description_strip;
    }

    /**
     * Set uploadtime
     *
     * @param integer $uploadtime
     *
     * @return Resources
     */
    public function setUploadtime($uploadtime)
    {
        $this->uploadtime = $uploadtime;

        return $this;
    }

    /**
     * Get uploadtime
     *
     * @return integer
     */
    public function getUploadtime()
    {
        return $this->uploadtime;
    }

    /**
     * Set downloads
     *
     * @param integer $downloads
     *
     * @return Resources
     */
    public function setDownloads($downloads)
    {
        $this->downloads = $downloads;

        return $this;
    }

    /**
     * Get downloads
     *
     * @return integer
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * Set comments
     *
     * @param integer $comments
     *
     * @return Resources
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return integer
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set like
     *
     * @param integer $like
     *
     * @return Resources
     */
    public function setLike($like)
    {
        $this->like = $like;

        return $this;
    }

    /**
     * Get like
     *
     * @return integer
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Resources
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return Resources
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Resources
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Add resourcesfile
     *
     * @param \DataBundle\Entity\Resourcesfiles $resourcesfile
     *
     * @return Resources
     */
    public function addResourcesfile(\DataBundle\Entity\Resourcesfiles $resourcesfile)
    {
        $this->resourcesfiles[] = $resourcesfile;

        return $this;
    }

    /**
     * Remove resourcesfile
     *
     * @param \DataBundle\Entity\Resourcesfiles $resourcesfile
     */
    public function removeResourcesfile(\DataBundle\Entity\Resourcesfiles $resourcesfile)
    {
        $this->resourcesfiles->removeElement($resourcesfile);
    }

    /**
     * Get resourcesfiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResourcesfiles()
    {
        return $this->resourcesfiles;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return Resources
     */
    public function setSubjects(\DataBundle\Entity\Subjects $subjects = null)
    {
        $this->subjects = $subjects;

        return $this;
    }

    /**
     * Get subjects
     *
     * @return \DataBundle\Entity\Subjects
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Resources
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
