<?php

namespace DataBundle\Entity;

/**
 * FacultiesClasses
 */
class FacultiesClasses
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Faculties
     */
    private $faculties;

    /**
     * @var \DataBundle\Entity\Classes
     */
    private $classes;


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
     * Set faculties
     *
     * @param \DataBundle\Entity\Faculties $faculties
     *
     * @return FacultiesClasses
     */
    public function setFaculties(\DataBundle\Entity\Faculties $faculties = null)
    {
        $this->faculties = $faculties;

        return $this;
    }

    /**
     * Get faculties
     *
     * @return \DataBundle\Entity\Faculties
     */
    public function getFaculties()
    {
        return $this->faculties;
    }

    /**
     * Set classes
     *
     * @param \DataBundle\Entity\Classes $classes
     *
     * @return FacultiesClasses
     */
    public function setClasses(\DataBundle\Entity\Classes $classes = null)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Get classes
     *
     * @return \DataBundle\Entity\Classes
     */
    public function getClasses()
    {
        return $this->classes;
    }
}
