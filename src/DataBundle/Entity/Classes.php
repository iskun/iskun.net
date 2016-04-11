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
 * Classes
 */
class Classes
{
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $name;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $description;

    /**
     * @var string
     */
    private $create_time;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classesstudents;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $courses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postsclasses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesclasses;

    /**
     * @var \DataBundle\Entity\Schools
     */
    private $schools;

    /**
     * @var \DataBundle\Entity\SchoolsYears
     */
    private $schoolsyears;

    /**
     * @var \DataBundle\Entity\Grades
     */
    private $grades;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $classesadministrator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classesstudents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postsclasses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesclasses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Classes
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
     * @return Classes
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
     * Set createTime
     *
     * @param string $createTime
     *
     * @return Classes
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Add classesstudent
     *
     * @param \DataBundle\Entity\ClassesStudents $classesstudent
     *
     * @return Classes
     */
    public function addClassesstudent(\DataBundle\Entity\ClassesStudents $classesstudent)
    {
        $this->classesstudents[] = $classesstudent;

        return $this;
    }

    /**
     * Remove classesstudent
     *
     * @param \DataBundle\Entity\ClassesStudents $classesstudent
     */
    public function removeClassesstudent(\DataBundle\Entity\ClassesStudents $classesstudent)
    {
        $this->classesstudents->removeElement($classesstudent);
    }

    /**
     * Get classesstudents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassesstudents()
    {
        return $this->classesstudents;
    }

    /**
     * Add course
     *
     * @param \DataBundle\Entity\Courses $course
     *
     * @return Classes
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
     * Add postsclass
     *
     * @param \DataBundle\Entity\PostsClasses $postsclass
     *
     * @return Classes
     */
    public function addPostsclass(\DataBundle\Entity\PostsClasses $postsclass)
    {
        $this->postsclasses[] = $postsclass;

        return $this;
    }

    /**
     * Remove postsclass
     *
     * @param \DataBundle\Entity\PostsClasses $postsclass
     */
    public function removePostsclass(\DataBundle\Entity\PostsClasses $postsclass)
    {
        $this->postsclasses->removeElement($postsclass);
    }

    /**
     * Get postsclasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsclasses()
    {
        return $this->postsclasses;
    }

    /**
     * Add facultiesclass
     *
     * @param \DataBundle\Entity\FacultiesClasses $facultiesclass
     *
     * @return Classes
     */
    public function addFacultiesclass(\DataBundle\Entity\FacultiesClasses $facultiesclass)
    {
        $this->facultiesclasses[] = $facultiesclass;

        return $this;
    }

    /**
     * Remove facultiesclass
     *
     * @param \DataBundle\Entity\FacultiesClasses $facultiesclass
     */
    public function removeFacultiesclass(\DataBundle\Entity\FacultiesClasses $facultiesclass)
    {
        $this->facultiesclasses->removeElement($facultiesclass);
    }

    /**
     * Get facultiesclasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesclasses()
    {
        return $this->facultiesclasses;
    }

    /**
     * Set schools
     *
     * @param \DataBundle\Entity\Schools $schools
     *
     * @return Classes
     */
    public function setSchools(\DataBundle\Entity\Schools $schools = null)
    {
        $this->schools = $schools;

        return $this;
    }

    /**
     * Get schools
     *
     * @return \DataBundle\Entity\Schools
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * Set schoolsyears
     *
     * @param \DataBundle\Entity\SchoolsYears $schoolsyears
     *
     * @return Classes
     */
    public function setSchoolsyears(\DataBundle\Entity\SchoolsYears $schoolsyears = null)
    {
        $this->schoolsyears = $schoolsyears;

        return $this;
    }

    /**
     * Get schoolsyears
     *
     * @return \DataBundle\Entity\SchoolsYears
     */
    public function getSchoolsyears()
    {
        return $this->schoolsyears;
    }

    /**
     * Set grades
     *
     * @param \DataBundle\Entity\Grades $grades
     *
     * @return Classes
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
     * Set classesadministrator
     *
     * @param \DataBundle\Entity\Users $classesadministrator
     *
     * @return Classes
     */
    public function setClassesadministrator(\DataBundle\Entity\Users $classesadministrator = null)
    {
        $this->classesadministrator = $classesadministrator;

        return $this;
    }

    /**
     * Get classesadministrator
     *
     * @return \DataBundle\Entity\Users
     */
    public function getClassesadministrator()
    {
        return $this->classesadministrator;
    }
}
