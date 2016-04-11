<?php

namespace DataBundle\Entity;

/**
 * PostsTests
 */
class PostsTests
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DataBundle\Entity\Tests
     */
    private $tests;

    /**
     * @var \DataBundle\Entity\Posts
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
     * Set status
     *
     * @param string $status
     *
     * @return PostsTests
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

    /**
     * Set tests
     *
     * @param \DataBundle\Entity\Tests $tests
     *
     * @return PostsTests
     */
    public function setTests(\DataBundle\Entity\Tests $tests = null)
    {
        $this->tests = $tests;

        return $this;
    }

    /**
     * Get tests
     *
     * @return \DataBundle\Entity\Tests
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return PostsTests
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
}
