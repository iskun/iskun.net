<?php

namespace DataBundle\Entity;

/**
 * TestsQuestions
 */
class TestsQuestions
{
    /**
     * @var integer
     */
    private $tid;

    /**
     * @var integer
     */
    private $tratio;

    /**
     * @var integer
     */
    private $torder;

    /**
     * @var \DataBundle\Entity\Questions
     */
    private $questions;

    /**
     * @var \DataBundle\Entity\Tests
     */
    private $tests;


    /**
     * Get tid
     *
     * @return integer
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set tratio
     *
     * @param integer $tratio
     *
     * @return TestsQuestions
     */
    public function setTratio($tratio)
    {
        $this->tratio = $tratio;

        return $this;
    }

    /**
     * Get tratio
     *
     * @return integer
     */
    public function getTratio()
    {
        return $this->tratio;
    }

    /**
     * Set torder
     *
     * @param integer $torder
     *
     * @return TestsQuestions
     */
    public function setTorder($torder)
    {
        $this->torder = $torder;

        return $this;
    }

    /**
     * Get torder
     *
     * @return integer
     */
    public function getTorder()
    {
        return $this->torder;
    }

    /**
     * Set questions
     *
     * @param \DataBundle\Entity\Questions $questions
     *
     * @return TestsQuestions
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

    /**
     * Set tests
     *
     * @param \DataBundle\Entity\Tests $tests
     *
     * @return TestsQuestions
     */
    public function setTests(\DataBundle\Entity\Tests $tests = null)
    {
        $this->tests = $tests;

        return $this;
    }

    /**
     * Get tests
     *
     * @return \DataBundle\Entity\Tests
     */
    public function getTests()
    {
        return $this->tests;
    }
}
