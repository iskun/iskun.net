<?php

namespace DataBundle\Entity;

/**
 * Images
 */
class Images
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $root_name;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $path;

    /**
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var string
     */
    private $orientation;

    /**
     * @var integer
     */
    private $time;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postsimages;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $likes;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postsimages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set rootName
     *
     * @param string $rootName
     *
     * @return Images
     */
    public function setRootName($rootName)
    {
        $this->root_name = $rootName;

        return $this;
    }

    /**
     * Get rootName
     *
     * @return string
     */
    public function getRootName()
    {
        return $this->root_name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Images
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
     * Set description
     *
     * @param string $description
     *
     * @return Images
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
     * Set path
     *
     * @param string $path
     *
     * @return Images
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Images
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Images
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set orientation
     *
     * @param string $orientation
     *
     * @return Images
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Images
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
     * Add postsimage
     *
     * @param \DataBundle\Entity\PostsImages $postsimage
     *
     * @return Images
     */
    public function addPostsimage(\DataBundle\Entity\PostsImages $postsimage)
    {
        $this->postsimages[] = $postsimage;

        return $this;
    }

    /**
     * Remove postsimage
     *
     * @param \DataBundle\Entity\PostsImages $postsimage
     */
    public function removePostsimage(\DataBundle\Entity\PostsImages $postsimage)
    {
        $this->postsimages->removeElement($postsimage);
    }

    /**
     * Get postsimages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsimages()
    {
        return $this->postsimages;
    }

    /**
     * Add like
     *
     * @param \DataBundle\Entity\Likes $like
     *
     * @return Images
     */
    public function addLike(\DataBundle\Entity\Likes $like)
    {
        $this->likes[] = $like;

        return $this;
    }

    /**
     * Remove like
     *
     * @param \DataBundle\Entity\Likes $like
     */
    public function removeLike(\DataBundle\Entity\Likes $like)
    {
        $this->likes->removeElement($like);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Images
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
