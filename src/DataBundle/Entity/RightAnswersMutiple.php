<?php

namespace DataBundle\Entity;
use JMS\Serializer\Annotation\AccessType;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\MaxDepth;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
/**
 * RightAnswersMutiple
 */
class RightAnswersMutiple
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DataBundle\Entity\Questions
     */
    private $questions;

    /**
     * @var \DataBundle\Entity\Answers
     * @Groups({"basic","full"}) 
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
     * Set content
     *
     * @param string $content
     *
     * @return RightAnswersMutiple
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
     * Set questions
     *
     * @param \DataBundle\Entity\Questions $questions
     *
     * @return RightAnswersMutiple
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
     * Set answers
     *
     * @param \DataBundle\Entity\Answers $answers
     *
     * @return RightAnswersMutiple
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
