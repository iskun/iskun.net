<?php

namespace DataBundle\Entity;

/**
 * AnswersDatas
 */
class AnswersDatas
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
     * @var \DataBundle\Entity\Answers
     */
    private $answers;


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
     * @return AnswersDatas
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
     * @return AnswersDatas
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
     * Set answers
     *
     * @param \DataBundle\Entity\Answers $answers
     *
     * @return AnswersDatas
     */
    public function setAnswers(\DataBundle\Entity\Answers $answers = null)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return \DataBundle\Entity\Answers
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
