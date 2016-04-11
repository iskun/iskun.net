<?php

namespace DataBundle\Entity;

/**
 * TestsTypesSubjects
 */
class TestsTypesSubjects
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\TestsTypes
     */
    private $teststypes;


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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return TestsTypesSubjects
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return TestsTypesSubjects
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
     * Set teststypes
     *
     * @param \DataBundle\Entity\TestsTypes $teststypes
     *
     * @return TestsTypesSubjects
     */
    public function setTeststypes(\DataBundle\Entity\TestsTypes $teststypes = null)
    {
        $this->teststypes = $teststypes;

        return $this;
    }

    /**
     * Get teststypes
     *
     * @return \DataBundle\Entity\TestsTypes
     */
    public function getTeststypes()
    {
        return $this->teststypes;
    }
}
