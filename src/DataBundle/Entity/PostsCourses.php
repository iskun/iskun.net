<?php

namespace DataBundle\Entity;

/**
 * PostsCourses
 */
class PostsCourses
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
     * @var string
     */
    private $follow;

    /**
     * @var string
     */
    private $un_follow;

    /**
     * @var \DataBundle\Entity\Posts
     */
    private $posts;

    /**
     * @var \DataBundle\Entity\Courses
     */
    private $courses;


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
     * @return PostsCourses
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
     * @return PostsCourses
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
     * @return PostsCourses
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
     * @return PostsCourses
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
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return PostsCourses
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
     * Set courses
     *
     * @param \DataBundle\Entity\Courses $courses
     *
     * @return PostsCourses
     */
    public function setCourses(\DataBundle\Entity\Courses $courses = null)
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * Get courses
     *
     * @return \DataBundle\Entity\Courses
     */
    public function getCourses()
    {
        return $this->courses;
    }
}
