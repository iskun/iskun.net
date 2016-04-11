<?php

namespace DataBundle\Entity;

/**
 * Categories
 */
class Categories
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $depth;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categoriessubjects;

    /**
     * @var \DataBundle\Entity\Categories
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categoriessubjects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Categories
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categories
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
     * Set depth
     *
     * @param integer $depth
     *
     * @return Categories
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return integer
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Categories
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
     * Add child
     *
     * @param \DataBundle\Entity\Categories $child
     *
     * @return Categories
     */
    public function addChild(\DataBundle\Entity\Categories $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\Categories $child
     */
    public function removeChild(\DataBundle\Entity\Categories $child)
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
     * Add categoriessubject
     *
     * @param \DataBundle\Entity\CategoriesSubjects $categoriessubject
     *
     * @return Categories
     */
    public function addCategoriessubject(\DataBundle\Entity\CategoriesSubjects $categoriessubject)
    {
        $this->categoriessubjects[] = $categoriessubject;

        return $this;
    }

    /**
     * Remove categoriessubject
     *
     * @param \DataBundle\Entity\CategoriesSubjects $categoriessubject
     */
    public function removeCategoriessubject(\DataBundle\Entity\CategoriesSubjects $categoriessubject)
    {
        $this->categoriessubjects->removeElement($categoriessubject);
    }

    /**
     * Get categoriessubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoriessubjects()
    {
        return $this->categoriessubjects;
    }

    /**
     * Set parent
     *
     * @param \DataBundle\Entity\Categories $parent
     *
     * @return Categories
     */
    public function setParent(\DataBundle\Entity\Categories $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\Categories
     */
    public function getParent()
    {
        return $this->parent;
    }
}
