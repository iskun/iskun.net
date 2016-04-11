<?php

namespace DataBundle\Entity;

/**
 * TestsTypesDatas
 */
class TestsTypesDatas
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
     * Set index
     *
     * @param string $index
     *
     * @return TestsTypesDatas
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
     * @return TestsTypesDatas
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
     * Set teststypes
     *
     * @param \DataBundle\Entity\TestsTypes $teststypes
     *
     * @return TestsTypesDatas
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
