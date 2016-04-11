<?php

namespace DataBundle\Entity;

/**
 * Courses
 */
class Courses
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $create_time;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $teacher_status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $coursesstudents;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postsclasses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postscourses;

    /**
     * @var \DataBundle\Entity\Classes
     */
    private $classes;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coursesstudents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postsclasses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postscourses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set createTime
     *
     * @param integer $createTime
     *
     * @return Courses
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
     * Set url
     *
     * @param string $url
     *
     * @return Courses
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
     * Set teacherStatus
     *
     * @param string $teacherStatus
     *
     * @return Courses
     */
    public function setTeacherStatus($teacherStatus)
    {
        $this->teacher_status = $teacherStatus;

        return $this;
    }

    /**
     * Get teacherStatus
     *
     * @return string
     */
    public function getTeacherStatus()
    {
        return $this->teacher_status;
    }

    /**
     * Add coursesstudent
     *
     * @param \DataBundle\Entity\CoursesStudents $coursesstudent
     *
     * @return Courses
     */
    public function addCoursesstudent(\DataBundle\Entity\CoursesStudents $coursesstudent)
    {
        $this->coursesstudents[] = $coursesstudent;

        return $this;
    }

    /**
     * Remove coursesstudent
     *
     * @param \DataBundle\Entity\CoursesStudents $coursesstudent
     */
    public function removeCoursesstudent(\DataBundle\Entity\CoursesStudents $coursesstudent)
    {
        $this->coursesstudents->removeElement($coursesstudent);
    }

    /**
     * Get coursesstudents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoursesstudents()
    {
        return $this->coursesstudents;
    }

    /**
     * Add postsclass
     *
     * @param \DataBundle\Entity\PostsClasses $postsclass
     *
     * @return Courses
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
     * Add postscourse
     *
     * @param \DataBundle\Entity\PostsCourses $postscourse
     *
     * @return Courses
     */
    public function addPostscourse(\DataBundle\Entity\PostsCourses $postscourse)
    {
        $this->postscourses[] = $postscourse;

        return $this;
    }

    /**
     * Remove postscourse
     *
     * @param \DataBundle\Entity\PostsCourses $postscourse
     */
    public function removePostscourse(\DataBundle\Entity\PostsCourses $postscourse)
    {
        $this->postscourses->removeElement($postscourse);
    }

    /**
     * Get postscourses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostscourses()
    {
        return $this->postscourses;
    }

    /**
     * Set classes
     *
     * @param \DataBundle\Entity\Classes $classes
     *
     * @return Courses
     */
    public function setClasses(\DataBundle\Entity\Classes $classes = null)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Get classes
     *
     * @return \DataBundle\Entity\Classes
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return Courses
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
     * @return Courses
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
}
