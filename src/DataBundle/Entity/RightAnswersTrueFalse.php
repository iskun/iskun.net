<?php

namespace DataBundle\Entity;

/**
 * RightAnswersTrueFalse
 */
class RightAnswersTrueFalse
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $answersdatas;

    /**
     * @var \DataBundle\Entity\Questions
     */
    private $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answersdatas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set content
     *
     * @param string $content
     *
     * @return RightAnswersTrueFalse
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add answersdata
     *
     * @param \DataBundle\Entity\AnswersDatas $answersdata
     *
     * @return RightAnswersTrueFalse
     */
    public function addAnswersdata(\DataBundle\Entity\AnswersDatas $answersdata)
    {
        $this->answersdatas[] = $answersdata;

        return $this;
    }

    /**
     * Remove answersdata
     *
     * @param \DataBundle\Entity\AnswersDatas $answersdata
     */
    public function removeAnswersdata(\DataBundle\Entity\AnswersDatas $answersdata)
    {
        $this->answersdatas->removeElement($answersdata);
    }

    /**
     * Get answersdatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswersdatas()
    {
        return $this->answersdatas;
    }

    /**
     * Set questions
     *
     * @param \DataBundle\Entity\Questions $questions
     *
     * @return RightAnswersTrueFalse
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
