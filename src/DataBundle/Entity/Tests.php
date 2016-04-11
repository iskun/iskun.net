<?php

namespace DataBundle\Entity;

/**
 * Tests
 */
class Tests
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $time;

    /**
     * @var integer
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
    private $use;

    /**
     * @var integer
     */
    private $create_time;

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
     */
    private $testsusers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $poststests;

    /**
     * @var \DataBundle\Entity\SubjectsChapters
     */
    private $subjectschapters;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\TestsTypes
     */
    private $teststypes;

    /**
     * @var \DataBundle\Entity\Tests
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->testsquestions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->testsusers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->poststests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Tests
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tests
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Tests
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Tests
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Tests
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
     * Set sharing
     *
     * @param integer $sharing
     *
     * @return Tests
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
     * @return Tests
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
     * @return Tests
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
     * Set use
     *
     * @param string $use
     *
     * @return Tests
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
     * Set createTime
     *
     * @param integer $createTime
     *
     * @return Tests
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
     * Add testsquestion
     *
     * @param \DataBundle\Entity\TestsQuestions $testsquestion
     *
     * @return Tests
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
     * @param \DataBundle\Entity\Tests $child
     *
     * @return Tests
     */
    public function addChild(\DataBundle\Entity\Tests $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\Tests $child
     */
    public function removeChild(\DataBundle\Entity\Tests $child)
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
     * Add testsuser
     *
     * @param \DataBundle\Entity\TestsUsers $testsuser
     *
     * @return Tests
     */
    public function addTestsuser(\DataBundle\Entity\TestsUsers $testsuser)
    {
        $this->testsusers[] = $testsuser;

        return $this;
    }

    /**
     * Remove testsuser
     *
     * @param \DataBundle\Entity\TestsUsers $testsuser
     */
    public function removeTestsuser(\DataBundle\Entity\TestsUsers $testsuser)
    {
        $this->testsusers->removeElement($testsuser);
    }

    /**
     * Get testsusers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTestsusers()
    {
        return $this->testsusers;
    }

    /**
     * Add poststest
     *
     * @param \DataBundle\Entity\PostsTests $poststest
     *
     * @return Tests
     */
    public function addPoststest(\DataBundle\Entity\PostsTests $poststest)
    {
        $this->poststests[] = $poststest;

        return $this;
    }

    /**
     * Remove poststest
     *
     * @param \DataBundle\Entity\PostsTests $poststest
     */
    public function removePoststest(\DataBundle\Entity\PostsTests $poststest)
    {
        $this->poststests->removeElement($poststest);
    }

    /**
     * Get poststests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoststests()
    {
        return $this->poststests;
    }

    /**
     * Set subjectschapters
     *
     * @param \DataBundle\Entity\SubjectsChapters $subjectschapters
     *
     * @return Tests
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
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return Tests
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
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Tests
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
     * Set teststypes
     *
     * @param \DataBundle\Entity\TestsTypes $teststypes
     *
     * @return Tests
     */
    public function setTeststypes(\DataBundle\Entity\TestsTypes $teststypes = null)
    {
        $this->teststypes = $teststypes;

        return $this;
    }

    /**
     * Get teststypes
     *
     * @return \DataBundle\Entity\TestsTypes
     */
    public function getTeststypes()
    {
        return $this->teststypes;
    }

    /**
     * Set parent
     *
     * @param \DataBundle\Entity\Tests $parent
     *
     * @return Tests
     */
    public function setParent(\DataBundle\Entity\Tests $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\Tests
     */
    public function getParent()
    {
        return $this->parent;
    }
}
