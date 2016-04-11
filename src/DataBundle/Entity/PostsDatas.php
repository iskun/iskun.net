<?php

namespace DataBundle\Entity;

/**
 * PostsDatas
 */
class PostsDatas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $value;

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
     * Set index
     *
     * @param string $index
     *
     * @return PostsDatas
     */
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Get index
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return PostsDatas
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return PostsDatas
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
