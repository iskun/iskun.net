<?php

namespace DataBundle\Entity;

/**
 * ContestsQuestionsDatas
 */
class ContestsQuestionsDatas
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
     * @var \DataBundle\Entity\Questions
     */
    private $questions;


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
     * @return ContestsQuestionsDatas
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
     * @return ContestsQuestionsDatas
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
     * Set questions
     *
     * @param \DataBundle\Entity\Questions $questions
     *
     * @return ContestsQuestionsDatas
     */
    public function setQuestions(\DataBundle\Entity\Questions $questions = null)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return \DataBundle\Entity\Questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
