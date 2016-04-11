<?php

namespace DataBundle\Entity;
use JMS\Serializer\Annotation\AccessType;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\MaxDepth;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
/**
 * Comments
 */
class Comments
{
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var integer
     */
    private $likes = 0;

    /**
     * @var string
     */
    private $likers;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $content;

    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $time;

    /**
     * @var integer
     */
    private $update_time;

    /**
     * @var string
     */
    private $editreason;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic"}) 
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Comments
     */
    private $parent;

    /**
     * @var \DataBundle\Entity\Posts
     */
    private $posts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ip
     *
     * @param string $ip
     *
     * @return Comments
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
     * Set likes
     *
     * @param integer $likes
     *
     * @return Comments
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set likers
     *
     * @param string $likers
     *
     * @return Comments
     */
    public function setLikers($likers)
    {
        $this->likers = $likers;

        return $this;
    }

    /**
     * Get likers
     *
     * @return string
     */
    public function getLikers()
    {
        return $this->likers;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comments
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Comments
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
     * @return Comments
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
     * Set editreason
     *
     * @param string $editreason
     *
     * @return Comments
     */
    public function setEditreason($editreason)
    {
        $this->editreason = $editreason;

        return $this;
    }

    /**
     * Get editreason
     *
     * @return string
     */
    public function getEditreason()
    {
        return $this->editreason;
    }

    /**
     * Add child
     *
     * @param \DataBundle\Entity\Comments $child
     *
     * @return Comments
     */
    public function addChild(\DataBundle\Entity\Comments $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\Comments $child
     */
    public function removeChild(\DataBundle\Entity\Comments $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Comments
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
     * Set parent
     *
     * @param \DataBundle\Entity\Comments $parent
     *
     * @return Comments
     */
    public function setParent(\DataBundle\Entity\Comments $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\Comments
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return Comments
     */
    public function setPosts(\DataBundle\Entity\Posts $posts = null)
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     * Get posts
     *
     * @return \DataBundle\Entity\Posts
     */
    public function getPosts()
    {
        return $this->posts;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $commentsfiles;


    /**
     * Add commentsfile
     *
     * @param \DataBundle\Entity\CommentsFiles $commentsfile
     *
     * @return Comments
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
    /**
     * @var string
     */
    private $status;


    /**
     * Set status
     *
     * @param string $status
     *
     * @return Comments
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
}
