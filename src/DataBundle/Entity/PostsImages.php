<?php

namespace DataBundle\Entity;

/**
 * PostsImages
 */
class PostsImages
{
    /**
     * @var integer
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
     * @var integer
     */
    private $order;

    /**
     * @var \DataBundle\Entity\Posts
     */
    private $posts;

    /**
     * @var \DataBundle\Entity\Images
     */
    private $images;


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
     * @return PostsImages
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
     * @return PostsImages
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
     * Set order
     *
     * @param integer $order
     *
     * @return PostsImages
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return PostsImages
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
     * Set images
     *
     * @param \DataBundle\Entity\Images $images
     *
     * @return PostsImages
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
}
