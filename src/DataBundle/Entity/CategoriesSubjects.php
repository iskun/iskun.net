<?php

namespace DataBundle\Entity;

/**
 * CategoriesSubjects
 */
class CategoriesSubjects
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\Categories
     */
    private $categories;


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
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return CategoriesSubjects
     */
    public function setSubjects(\DataBundle\Entity\Subjects $subjects = null)
    {
        $this->subjects = $subjects;

        return $this;
    }

    /**
     * Get subjects
     *
     * @return \DataBundle\Entity\Subjects
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Set categories
     *
     * @param \DataBundle\Entity\Categories $categories
     *
     * @return CategoriesSubjects
     */
    public function setCategories(\DataBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \DataBundle\Entity\Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
