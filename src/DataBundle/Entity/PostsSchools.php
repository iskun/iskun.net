<?php

namespace DataBundle\Entity;

/**
 * PostsSchools
 */
class PostsSchools
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
     * @var \DataBundle\Entity\Schools
     */
    private $schools;

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
     * @return PostsSchools
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
     * @return PostsSchools
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
     * @return PostsSchools
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
     * @return PostsSchools
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
     * @return PostsSchools
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
     * Set schools
     *
     * @param \DataBundle\Entity\Schools $schools
     *
     * @return PostsSchools
     */
    public function setSchools(\DataBundle\Entity\Schools $schools = null)
    {
        $this->schools = $schools;

        return $this;
    }

    /**
     * Get schools
     *
     * @return \DataBundle\Entity\Schools
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * Set courses
     *
     * @param \DataBundle\Entity\Courses $courses
     *
     * @return PostsSchools
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
