<?php

namespace DataBundle\Entity;

/**
 * SchoolsYears
 */
class SchoolsYears
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $start;

    /**
     * @var integer
     */
    private $end;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classes;

    /**
     * @var \DataBundle\Entity\Schools
     */
    private $schools;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set number
     *
     * @param integer $number
     *
     * @return SchoolsYears
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SchoolsYears
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
     * Set start
     *
     * @param integer $start
     *
     * @return SchoolsYears
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return integer
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param integer $end
     *
     * @return SchoolsYears
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return integer
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Add class
     *
     * @param \DataBundle\Entity\Classes $class
     *
     * @return SchoolsYears
     */
    public function addClass(\DataBundle\Entity\Classes $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \DataBundle\Entity\Classes $class
     */
    public function removeClass(\DataBundle\Entity\Classes $class)
    {
        $this->classes->removeElement($class);
    }

    /**
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Set schools
     *
     * @param \DataBundle\Entity\Schools $schools
     *
     * @return SchoolsYears
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
}
