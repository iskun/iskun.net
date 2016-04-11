<?php

namespace DataBundle\Entity;

/**
 * TestsTypesQuestionsTypes
 */
class TestsTypesQuestionsTypes
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
     * @var \DataBundle\Entity\QuestionsTypes
     */
    private $questionstypes;

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
     * @return TestsTypesQuestionsTypes
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
     * Set questionstypes
     *
     * @param \DataBundle\Entity\QuestionsTypes $questionstypes
     *
     * @return TestsTypesQuestionsTypes
     */
    public function setQuestionstypes(\DataBundle\Entity\QuestionsTypes $questionstypes = null)
    {
        $this->questionstypes = $questionstypes;

        return $this;
    }

    /**
     * Get questionstypes
     *
     * @return \DataBundle\Entity\QuestionsTypes
     */
    public function getQuestionstypes()
    {
        return $this->questionstypes;
    }

    /**
     * Set teststypes
     *
     * @param \DataBundle\Entity\TestsTypes $teststypes
     *
     * @return TestsTypesQuestionsTypes
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
