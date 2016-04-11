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
 * UsersWalls
 */
class UsersWalls
{
    /**
     * @var integer.
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var integer
     */
    private $sharing;

    /**
     * @var string
     */
    private $follow;

    /**
     * @var string
     */
    private $un_follow;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic"}) 
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Posts
     * @Groups({"basic"}) 
     */
    private $posts;


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
     * Set visible
     *
     * @param integer $visible
     *
     * @return UsersWalls
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set sharing
     *
     * @param integer $sharing
     *
     * @return UsersWalls
     */
    public function setSharing($sharing)
    {
        $this->sharing = $sharing;

        return $this;
    }

    /**
     * Get sharing
     *
     * @return integer
     */
    public function getSharing()
    {
        return $this->sharing;
    }

    /**
     * Set follow
     *
     * @param string $follow
     *
     * @return UsersWalls
     */
    public function setFollow($follow)
    {
        $this->follow = $follow;

        return $this;
    }

    /**
     * Get follow
     *
     * @return string
     */
    public function getFollow()
    {
        return $this->follow;
    }

    /**
     * Set unFollow
     *
     * @param string $unFollow
     *
     * @return UsersWalls
     */
    public function setUnFollow($unFollow)
    {
        $this->un_follow = $unFollow;

        return $this;
    }

    /**
     * Get unFollow
     *
     * @return string
     */
    public function getUnFollow()
    {
        return $this->un_follow;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return UsersWalls
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
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return UsersWalls
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
     * @var boolean
     */
    private $homepage;

    /**
     * @var boolean
     */
    private $private;


    /**
     * Set homepage
     *
     * @param boolean $homepage
     *
     * @return UsersWalls
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return boolean
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set private
     *
     * @param boolean $private
     *
     * @return UsersWalls
     */
    public function setPrivate($private)
    {
        $this->private = $private;

        return $this;
    }

    /**
     * Get private
     *
     * @return boolean
     */
    public function getPrivate()
    {
        return $this->private;
    }
    /**
     * @var boolean
     */
    private $home;


    /**
     * Set home
     *
     * @param boolean $home
     *
     * @return UsersWalls
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home
     *
     * @return boolean
     */
    public function getHome()
    {
        return $this->home;
    }
}
