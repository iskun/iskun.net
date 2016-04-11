<?php

namespace DataBundle\Entity;

/**
 * Likes
 */
class Likes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Images
     */
    private $images;

    /**
     * @var \DataBundle\Entity\Posts
     */
    private $posts;

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
     * Set images
     *
     * @param \DataBundle\Entity\Images $images
     *
     * @return Likes
     */
    public function setImages(\DataBundle\Entity\Images $images = null)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \DataBundle\Entity\Images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return Likes
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
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Likes
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
