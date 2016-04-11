<?php

namespace DataBundle\Entity;

/**
 * ContestsAnswers
 */
class ContestsAnswers
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
     * @var \DataBundle\Entity\ContestsQuestions
     */
    private $contestsquestions;


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
     * @return ContestsAnswers
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
     * Set contestsquestions
     *
     * @param \DataBundle\Entity\ContestsQuestions $contestsquestions
     *
     * @return ContestsAnswers
     */
    public function setContestsquestions(\DataBundle\Entity\ContestsQuestions $contestsquestions = null)
    {
        $this->contestsquestions = $contestsquestions;

        return $this;
    }

    /**
     * Get contestsquestions
     *
     * @return \DataBundle\Entity\ContestsQuestions
     */
    public function getContestsquestions()
    {
        return $this->contestsquestions;
    }
}
