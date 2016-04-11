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
 * Subjects
 */
class Subjects
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
    private $name;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $url;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $color;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $courses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $resources;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $subjectschapters;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subjectsusers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teachingsubjects;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tests;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categoriessubjects;

    /**
     * @var \DataBundle\Entity\Grades
     * @Groups({"basic","full"}) 
     */
    private $grades;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $subjectscreator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->resources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subjectschapters = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subjectsusers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teachingsubjects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categoriessubjects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Subjects
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
     * Set url
     *
     * @param string $url
     *
     * @return Subjects
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
     * Set type
     *
     * @param string $type
     *
     * @return Subjects
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Subjects
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add course
     *
     * @param \DataBundle\Entity\Courses $course
     *
     * @return Subjects
     */
    public function addCourse(\DataBundle\Entity\Courses $course)
    {
        $this->courses[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \DataBundle\Entity\Courses $course
     */
    public function removeCourse(\DataBundle\Entity\Courses $course)
    {
        $this->courses->removeElement($course);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Add resource
     *
     * @param \DataBundle\Entity\Resources $resource
     *
     * @return Subjects
     */
    public function addResource(\DataBundle\Entity\Resources $resource)
    {
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * Remove resource
     *
     * @param \DataBundle\Entity\Resources $resource
     */
    public function removeResource(\DataBundle\Entity\Resources $resource)
    {
        $this->resources->removeElement($resource);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Add subjectschapter
     *
     * @param \DataBundle\Entity\SubjectsChapters $subjectschapter
     *
     * @return Subjects
     */
    public function addSubjectschapter(\DataBundle\Entity\SubjectsChapters $subjectschapter)
    {
        $this->subjectschapters[] = $subjectschapter;

        return $this;
    }

    /**
     * Remove subjectschapter
     *
     * @param \DataBundle\Entity\SubjectsChapters $subjectschapter
     */
    public function removeSubjectschapter(\DataBundle\Entity\SubjectsChapters $subjectschapter)
    {
        $this->subjectschapters->removeElement($subjectschapter);
    }

    /**
     * Get subjectschapters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectschapters()
    {
        return $this->subjectschapters;
    }

    /**
     * Add subjectsuser
     *
     * @param \DataBundle\Entity\SubjectsUsers $subjectsuser
     *
     * @return Subjects
     */
    public function addSubjectsuser(\DataBundle\Entity\SubjectsUsers $subjectsuser)
    {
        $this->subjectsusers[] = $subjectsuser;

        return $this;
    }

    /**
     * Remove subjectsuser
     *
     * @param \DataBundle\Entity\SubjectsUsers $subjectsuser
     */
    public function removeSubjectsuser(\DataBundle\Entity\SubjectsUsers $subjectsuser)
    {
        $this->subjectsusers->removeElement($subjectsuser);
    }

    /**
     * Get subjectsusers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectsusers()
    {
        return $this->subjectsusers;
    }

    /**
     * Add teachingsubject
     *
     * @param \DataBundle\Entity\TeachingSubjects $teachingsubject
     *
     * @return Subjects
     */
    public function addTeachingsubject(\DataBundle\Entity\TeachingSubjects $teachingsubject)
    {
        $this->teachingsubjects[] = $teachingsubject;

        return $this;
    }

    /**
     * Remove teachingsubject
     *
     * @param \DataBundle\Entity\TeachingSubjects $teachingsubject
     */
    public function removeTeachingsubject(\DataBundle\Entity\TeachingSubjects $teachingsubject)
    {
        $this->teachingsubjects->removeElement($teachingsubject);
    }

    /**
     * Get teachingsubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeachingsubjects()
    {
        return $this->teachingsubjects;
    }

    /**
     * Add test
     *
     * @param \DataBundle\Entity\Tests $test
     *
     * @return Subjects
     */
    public function addTest(\DataBundle\Entity\Tests $test)
    {
        $this->tests[] = $test;

        return $this;
    }

    /**
     * Remove test
     *
     * @param \DataBundle\Entity\Tests $test
     */
    public function removeTest(\DataBundle\Entity\Tests $test)
    {
        $this->tests->removeElement($test);
    }

    /**
     * Get tests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * Add question
     *
     * @param \DataBundle\Entity\Questions $question
     *
     * @return Subjects
     */
    public function addQuestion(\DataBundle\Entity\Questions $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \DataBundle\Entity\Questions $question
     */
    public function removeQuestion(\DataBundle\Entity\Questions $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add categoriessubject
     *
     * @param \DataBundle\Entity\CategoriesSubjects $categoriessubject
     *
     * @return Subjects
     */
    public function addCategoriessubject(\DataBundle\Entity\CategoriesSubjects $categoriessubject)
    {
        $this->categoriessubjects[] = $categoriessubject;

        return $this;
    }

    /**
     * Remove categoriessubject
     *
     * @param \DataBundle\Entity\CategoriesSubjects $categoriessubject
     */
    public function removeCategoriessubject(\DataBundle\Entity\CategoriesSubjects $categoriessubject)
    {
        $this->categoriessubjects->removeElement($categoriessubject);
    }

    /**
     * Get categoriessubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoriessubjects()
    {
        return $this->categoriessubjects;
    }

    /**
     * Set grades
     *
     * @param \DataBundle\Entity\Grades $grades
     *
     * @return Subjects
     */
    public function setGrades(\DataBundle\Entity\Grades $grades = null)
    {
        $this->grades = $grades;

        return $this;
    }

    /**
     * Get grades
     *
     * @return \DataBundle\Entity\Grades
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * Set subjectscreator
     *
     * @param \DataBundle\Entity\Users $subjectscreator
     *
     * @return Subjects
     */
    public function setSubjectscreator(\DataBundle\Entity\Users $subjectscreator = null)
    {
        $this->subjectscreator = $subjectscreator;

        return $this;
    }

    /**
     * Get subjectscreator
     *
     * @return \DataBundle\Entity\Users
     */
    public function getSubjectscreator()
    {
        return $this->subjectscreator;
    }
    /**
     * @var string
     * @Groups({"basic","full"})  
     */
    private $thumbnail;


    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return Subjects
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }
    /**
     * @var \DataBundle\Entity\Slugs
     * @Groups({"basic","full"}) 
     */
    private $slugs;


    /**
     * Set slugs
     *
     * @param \DataBundle\Entity\Slugs $slugs
     *
     * @return Subjects
     */
    public function setSlugs(\DataBundle\Entity\Slugs $slugs = null)
    {
        $this->slugs = $slugs;

        return $this;
    }

    /**
     * Get slugs
     *
     * @return \DataBundle\Entity\Slugs
     */
    public function getSlugs()
    {
        return $this->slugs;
    }
}
