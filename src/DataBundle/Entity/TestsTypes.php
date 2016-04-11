<?php

namespace DataBundle\Entity;

/**
 * TestsTypes
 */
class TestsTypes
{
    /**
     * @var integer
     */
    private $id;

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
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tests;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \DataBundle\Entity\TestsTypes
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return TestsTypes
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
     * @return TestsTypes
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
     * Set url
     *
     * @param string $url
     *
     * @return TestsTypes
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
     * Add test
     *
     * @param \DataBundle\Entity\Tests $test
     *
     * @return TestsTypes
     */
    public function addTest(\DataBundle\Entity\Tests $test)
    {
        $this->tests[] = $test;

        return $this;
    }

    /**
     * Remove test
     *
     * @param \DataBundle\Entity\Tests $test
     */
    public function removeTest(\DataBundle\Entity\Tests $test)
    {
        $this->tests->removeElement($test);
    }

    /**
     * Get tests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * Add child
     *
     * @param \DataBundle\Entity\TestsTypes $child
     *
     * @return TestsTypes
     */
    public function addChild(\DataBundle\Entity\TestsTypes $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\TestsTypes $child
     */
    public function removeChild(\DataBundle\Entity\TestsTypes $child)
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
     * Set parent
     *
     * @param \DataBundle\Entity\TestsTypes $parent
     *
     * @return TestsTypes
     */
    public function setParent(\DataBundle\Entity\TestsTypes $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\TestsTypes
     */
    public function getParent()
    {
        return $this->parent;
    }
}
