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
 * Answers
 */
class Answers
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var string
     * @Groups({"basic","full"}) 
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
     * @return Answers
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
     * @return Answers
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
     * @return Answers
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rightanswersmutiple;


    /**
     * Add rightanswersmutiple
     *
     * @param \DataBundle\Entity\RightAnswersMutiple $rightanswersmutiple
     *
     * @return Answers
     */
    public function addRightanswersmutiple(\DataBundle\Entity\RightAnswersMutiple $rightanswersmutiple)
    {
        $this->rightanswersmutiple[] = $rightanswersmutiple;

        return $this;
    }

    /**
     * Remove rightanswersmutiple
     *
     * @param \DataBundle\Entity\RightAnswersMutiple $rightanswersmutiple
     */
    public function removeRightanswersmutiple(\DataBundle\Entity\RightAnswersMutiple $rightanswersmutiple)
    {
        $this->rightanswersmutiple->removeElement($rightanswersmutiple);
    }

    /**
     * Get rightanswersmutiple
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRightanswersmutiple()
    {
        return $this->rightanswersmutiple;
    }
}
