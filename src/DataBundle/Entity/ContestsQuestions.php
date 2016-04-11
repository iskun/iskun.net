<?php

namespace DataBundle\Entity;

/**
 * ContestsQuestions
 */
class ContestsQuestions
{
    /**
     * @var integer
     */
    private $cid;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contestsanswers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contestsquestionsdatas;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\SubjectsChapters
     */
    private $subjectschapters;

    /**
     * @var \DataBundle\Entity\QuestionsTypes
     */
    private $questionstypes;

    /**
     * @var \DataBundle\Entity\Contests
     */
    private $contests;

    /**
     * @var \DataBundle\Entity\Questions
     */
    private $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contestsanswers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contestsquestionsdatas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get cid
     *
     * @return integer
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return ContestsQuestions
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
     * Add contestsanswer
     *
     * @param \DataBundle\Entity\ContestsAnswers $contestsanswer
     *
     * @return ContestsQuestions
     */
    public function addContestsanswer(\DataBundle\Entity\ContestsAnswers $contestsanswer)
    {
        $this->contestsanswers[] = $contestsanswer;

        return $this;
    }

    /**
     * Remove contestsanswer
     *
     * @param \DataBundle\Entity\ContestsAnswers $contestsanswer
     */
    public function removeContestsanswer(\DataBundle\Entity\ContestsAnswers $contestsanswer)
    {
        $this->contestsanswers->removeElement($contestsanswer);
    }

    /**
     * Get contestsanswers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContestsanswers()
    {
        return $this->contestsanswers;
    }

    /**
     * Add contestsquestionsdata
     *
     * @param \DataBundle\Entity\ContestsQuestionsDatas $contestsquestionsdata
     *
     * @return ContestsQuestions
     */
    public function addContestsquestionsdata(\DataBundle\Entity\ContestsQuestionsDatas $contestsquestionsdata)
    {
        $this->contestsquestionsdatas[] = $contestsquestionsdata;

        return $this;
    }

    /**
     * Remove contestsquestionsdata
     *
     * @param \DataBundle\Entity\ContestsQuestionsDatas $contestsquestionsdata
     */
    public function removeContestsquestionsdata(\DataBundle\Entity\ContestsQuestionsDatas $contestsquestionsdata)
    {
        $this->contestsquestionsdatas->removeElement($contestsquestionsdata);
    }

    /**
     * Get contestsquestionsdatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContestsquestionsdatas()
    {
        return $this->contestsquestionsdatas;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return ContestsQuestions
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
     * @return ContestsQuestions
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
     * @return ContestsQuestions
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
     * @return ContestsQuestions
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
     * Set contests
     *
     * @param \DataBundle\Entity\Contests $contests
     *
     * @return ContestsQuestions
     */
    public function setContests(\DataBundle\Entity\Contests $contests = null)
    {
        $this->contests = $contests;

        return $this;
    }

    /**
     * Get contests
     *
     * @return \DataBundle\Entity\Contests
     */
    public function getContests()
    {
        return $this->contests;
    }

    /**
     * Set questions
     *
     * @param \DataBundle\Entity\Questions $questions
     *
     * @return ContestsQuestions
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
