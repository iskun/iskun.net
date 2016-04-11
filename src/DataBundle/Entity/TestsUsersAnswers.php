<?php

namespace DataBundle\Entity;

/**
 * TestsUsersAnswers
 */
class TestsUsersAnswers
{
    /**
     * @var integer
     */
    private $ptuid;

    /**
     * @var string
     */
    private $tucontent;

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
     * Get ptuid
     *
     * @return integer
     */
    public function getPtuid()
    {
        return $this->ptuid;
    }

    /**
     * Set tucontent
     *
     * @param string $tucontent
     *
     * @return TestsUsersAnswers
     */
    public function setTucontent($tucontent)
    {
        $this->tucontent = $tucontent;

        return $this;
    }

    /**
     * Get tucontent
     *
     * @return string
     */
    public function getTucontent()
    {
        return $this->tucontent;
    }

    /**
     * Add answersdata
     *
     * @param \DataBundle\Entity\AnswersDatas $answersdata
     *
     * @return TestsUsersAnswers
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
     * @return TestsUsersAnswers
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
