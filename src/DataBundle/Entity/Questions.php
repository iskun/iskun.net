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
 * Questions
 */
class Questions
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
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $create_time;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $update_time;

    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $sharing;

    /**
     * @var integer
     */
    private $pricing;

    /**
     * @var integer
     */
    private $take;

    /**
     * @var string
     */
    private $tutorial;

    /**
     * @var integer
     */
    private $is_owner;

    /**
     * @var string
     */
    private $use;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $answers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questionsdatas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $testsquestions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $rightanswersmutiple;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $rightanswerstruefalse;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic","full"}) 
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Subjects
     * @Groups({"basic","full"}) 
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\SubjectsChapters
     * @Groups({"basic","full"}) 
     */
    private $subjectschapters;

    /**
     * @var \DataBundle\Entity\QuestionsTypes
     */
    private $questionstypes;

    /**
     * @var \DataBundle\Entity\Questions
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questionsdatas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->testsquestions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rightanswersmutiple = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rightanswerstruefalse = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Questions
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
     * Set createTime
     *
     * @param integer $createTime
     *
     * @return Questions
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return integer
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set updateTime
     *
     * @param integer $updateTime
     *
     * @return Questions
     */
    public function setUpdateTime($updateTime)
    {
        $this->update_time = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return integer
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set sharing
     *
     * @param integer $sharing
     *
     * @return Questions
     */
    public function setSharing($sharing)
    {
        $this->sharing = $sharing;

        return $this;
    }

    /**
     * Get sharing
     *
     * @return integer
     */
    public function getSharing()
    {
        return $this->sharing;
    }

    /**
     * Set pricing
     *
     * @param integer $pricing
     *
     * @return Questions
     */
    public function setPricing($pricing)
    {
        $this->pricing = $pricing;

        return $this;
    }

    /**
     * Get pricing
     *
     * @return integer
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Set take
     *
     * @param integer $take
     *
     * @return Questions
     */
    public function setTake($take)
    {
        $this->take = $take;

        return $this;
    }

    /**
     * Get take
     *
     * @return integer
     */
    public function getTake()
    {
        return $this->take;
    }

    /**
     * Set tutorial
     *
     * @param string $tutorial
     *
     * @return Questions
     */
    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    /**
     * Get tutorial
     *
     * @return string
     */
    public function getTutorial()
    {
        return $this->tutorial;
    }

    /**
     * Set isOwner
     *
     * @param integer $isOwner
     *
     * @return Questions
     */
    public function setIsOwner($isOwner)
    {
        $this->is_owner = $isOwner;

        return $this;
    }

    /**
     * Get isOwner
     *
     * @return integer
     */
    public function getIsOwner()
    {
        return $this->is_owner;
    }

    /**
     * Set use
     *
     * @param string $use
     *
     * @return Questions
     */
    public function setUse($use)
    {
        $this->use = $use;

        return $this;
    }

    /**
     * Get use
     *
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * Add answer
     *
     * @param \DataBundle\Entity\Answers $answer
     *
     * @return Questions
     */
    public function addAnswer(\DataBundle\Entity\Answers $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \DataBundle\Entity\Answers $answer
     */
    public function removeAnswer(\DataBundle\Entity\Answers $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Add questionsdata
     *
     * @param \DataBundle\Entity\QuestionsDatas $questionsdata
     *
     * @return Questions
     */
    public function addQuestionsdata(\DataBundle\Entity\QuestionsDatas $questionsdata)
    {
        $this->questionsdatas[] = $questionsdata;

        return $this;
    }

    /**
     * Remove questionsdata
     *
     * @param \DataBundle\Entity\QuestionsDatas $questionsdata
     */
    public function removeQuestionsdata(\DataBundle\Entity\QuestionsDatas $questionsdata)
    {
        $this->questionsdatas->removeElement($questionsdata);
    }

    /**
     * Get questionsdatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionsdatas()
    {
        return $this->questionsdatas;
    }

    /**
     * Add testsquestion
     *
     * @param \DataBundle\Entity\TestsQuestions $testsquestion
     *
     * @return Questions
     */
    public function addTestsquestion(\DataBundle\Entity\TestsQuestions $testsquestion)
    {
        $this->testsquestions[] = $testsquestion;

        return $this;
    }

    /**
     * Remove testsquestion
     *
     * @param \DataBundle\Entity\TestsQuestions $testsquestion
     */
    public function removeTestsquestion(\DataBundle\Entity\TestsQuestions $testsquestion)
    {
        $this->testsquestions->removeElement($testsquestion);
    }

    /**
     * Get testsquestions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTestsquestions()
    {
        return $this->testsquestions;
    }

    /**
     * Add child
     *
     * @param \DataBundle\Entity\Questions $child
     *
     * @return Questions
     */
    public function addChild(\DataBundle\Entity\Questions $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\Questions $child
     */
    public function removeChild(\DataBundle\Entity\Questions $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add rightanswersmutiple
     *
     * @param \DataBundle\Entity\RightAnswerMutiple $rightanswersmutiple
     *
     * @return Questions
     */
    public function addRightanswersmutiple(\DataBundle\Entity\RightAnswerMutiple $rightanswersmutiple)
    {
        $this->rightanswersmutiple[] = $rightanswersmutiple;

        return $this;
    }

    /**
     * Remove rightanswersmutiple
     *
     * @param \DataBundle\Entity\RightAnswerMutiple $rightanswersmutiple
     */
    public function removeRightanswersmutiple(\DataBundle\Entity\RightAnswerMutiple $rightanswersmutiple)
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

    /**
     * Add rightanswerstruefalse
     *
     * @param \DataBundle\Entity\RightAnswersTrueFalse $rightanswerstruefalse
     *
     * @return Questions
     */
    public function addRightanswerstruefalse(\DataBundle\Entity\RightAnswersTrueFalse $rightanswerstruefalse)
    {
        $this->rightanswerstruefalse[] = $rightanswerstruefalse;

        return $this;
    }

    /**
     * Remove rightanswerstruefalse
     *
     * @param \DataBundle\Entity\RightAnswersTrueFalse $rightanswerstruefalse
     */
    public function removeRightanswerstruefalse(\DataBundle\Entity\RightAnswersTrueFalse $rightanswerstruefalse)
    {
        $this->rightanswerstruefalse->removeElement($rightanswerstruefalse);
    }

    /**
     * Get rightanswerstruefalse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRightanswerstruefalse()
    {
        return $this->rightanswerstruefalse;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Questions
     */
    public function setUsers(\DataBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \DataBundle\Entity\Users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return Questions
     */
    public function setSubjects(\DataBundle\Entity\Subjects $subjects = null)
    {
        $this->subjects = $subjects;

        return $this;
    }

    /**
     * Get subjects
     *
     * @return \DataBundle\Entity\Subjects
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Set subjectschapters
     *
     * @param \DataBundle\Entity\SubjectsChapters $subjectschapters
     *
     * @return Questions
     */
    public function setSubjectschapters(\DataBundle\Entity\SubjectsChapters $subjectschapters = null)
    {
        $this->subjectschapters = $subjectschapters;

        return $this;
    }

    /**
     * Get subjectschapters
     *
     * @return \DataBundle\Entity\SubjectsChapters
     */
    public function getSubjectschapters()
    {
        return $this->subjectschapters;
    }

    /**
     * Set questionstypes
     *
     * @param \DataBundle\Entity\QuestionsTypes $questionstypes
     *
     * @return Questions
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
     * Set parent
     *
     * @param \DataBundle\Entity\Questions $parent
     *
     * @return Questions
     */
    public function setParent(\DataBundle\Entity\Questions $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\Questions
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * @var integer
     * @Groups({"basic","full"}) 

     */
    private $time;


    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Questions
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $share;


    /**
     * Set share
     *
     * @param integer $share
     *
     * @return Questions
     */
    public function setShare($share)
    {
        $this->share = $share;

        return $this;
    }

    /**
     * Get share
     *
     * @return integer
     */
    public function getShare()
    {
        return $this->share;
    }
}
