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
 * Users 
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @var integer
     * @Groups({"basic","full"}) 
     */
    private $id;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     * @Groups({"basic","full"})   
     */
    private $fullname;

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $gender;

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $email = '';

    /**
     * @var string
     */
    private $create_time;

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $type;

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $tel = '';

    /**
     * @var integer
     */
    private $tel_status = 0;

    /**
     * @var integer
     */
    private $email_status = 0;

    /**
     * @var integer
     * @Groups({"basic","full"})
     */
    private $active = 0;

    /**
     * @var integer
     */
    private $lastlogin = 0;

    /**
     * @var integer
     */
    private $balance = 0;

    /**
     * @var string
     * @Groups({"basic","full"})
     */
    private $avatar = '';

    /**
     * @var integer
     */
    private $last_request;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     */
    private $schoolscreater;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"full"})
     */
    private $subjectscreator;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"full"})
     */
    private $classesadministrator;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $courses; 



    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $posts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"})
     */
    private $schoolsteachers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"full"}) 
     */
    private $teachingsubjects;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $resources;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tests;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $from;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $to;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ips;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $images;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $likes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $platforms;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $testsusers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notifications;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postsusers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesteachers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsteachers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsteachersvalidate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesteachersvalidate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesadministrator;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsadministrator;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsviceadministrators;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesviceadministrators;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $facultiesviceadministratorsvalidate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $departmentsviceadministratorsvalidate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolsadministrators;

    /**
     * @var \DataBundle\Entity\Locations
     */
    private $locations;

    /**
     * @var \DataBundle\Entity\Slugs
     * @Groups({"basic","full"}) 
     */
    private $slugs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schoolscreater = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subjectscreator = new \Doctrine\Common\Collections\ArrayCollection();
        $this->classesadministrator = new \Doctrine\Common\Collections\ArrayCollection();
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolsteachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teachingsubjects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->resources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->from = new \Doctrine\Common\Collections\ArrayCollection();
        $this->to = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ips = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->platforms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->testsusers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notifications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postsusers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesteachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departmentsteachers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departmentsteachersvalidate = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesteachersvalidate = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesadministrator = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departmentsadministrator = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departmentsviceadministrators = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesviceadministrators = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facultiesviceadministratorsvalidate = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departmentsviceadministratorsvalidate = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolsadministrators = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Users
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Users
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Users
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createTime
     *
     * @param string $createTime
     *
     * @return Users
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
     * Set type
     *
     * @param string $type
     *
     * @return Users
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
     * Set tel
     *
     * @param string $tel
     *
     * @return Users
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set telStatus
     *
     * @param integer $telStatus
     *
     * @return Users
     */
    public function setTelStatus($telStatus)
    {
        $this->tel_status = $telStatus;

        return $this;
    }

    /**
     * Get telStatus
     *
     * @return integer
     */
    public function getTelStatus()
    {
        return $this->tel_status;
    }

    /**
     * Set emailStatus
     *
     * @param integer $emailStatus
     *
     * @return Users
     */
    public function setEmailStatus($emailStatus)
    {
        $this->email_status = $emailStatus;

        return $this;
    }

    /**
     * Get emailStatus
     *
     * @return integer
     */
    public function getEmailStatus()
    {
        return $this->email_status;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set lastlogin
     *
     * @param integer $lastlogin
     *
     * @return Users
     */
    public function setLastlogin($lastlogin)
    {
        $this->lastlogin = $lastlogin;

        return $this;
    }

    /**
     * Get lastlogin
     *
     * @return integer
     */
    public function getLastlogin()
    {
        return $this->lastlogin;
    }

    /**
     * Set balance
     *
     * @param integer $balance
     *
     * @return Users
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return integer
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Users
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set lastRequest
     *
     * @param integer $lastRequest
     *
     * @return Users
     */
    public function setLastRequest($lastRequest)
    {
        $this->last_request = $lastRequest;

        return $this;
    }

    /**
     * Get lastRequest
     *
     * @return integer
     */
    public function getLastRequest()
    {
        return $this->last_request;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Users
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add schoolscreater
     *
     * @param \DataBundle\Entity\Schools $schoolscreater
     *
     * @return Users
     */
    public function addSchoolscreater(\DataBundle\Entity\Schools $schoolscreater)
    {
        $this->schoolscreater[] = $schoolscreater;

        return $this;
    }

    /**
     * Remove schoolscreater
     *
     * @param \DataBundle\Entity\Schools $schoolscreater
     */
    public function removeSchoolscreater(\DataBundle\Entity\Schools $schoolscreater)
    {
        $this->schoolscreater->removeElement($schoolscreater);
    }

    /**
     * Get schoolscreater
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolscreater()
    {
        return $this->schoolscreater;
    }

    /**
     * Add subjectscreator
     *
     * @param \DataBundle\Entity\Subjects $subjectscreator
     *
     * @return Users
     */
    public function addSubjectscreator(\DataBundle\Entity\Subjects $subjectscreator)
    {
        $this->subjectscreator[] = $subjectscreator;

        return $this;
    }

    /**
     * Remove subjectscreator
     *
     * @param \DataBundle\Entity\Subjects $subjectscreator
     */
    public function removeSubjectscreator(\DataBundle\Entity\Subjects $subjectscreator)
    {
        $this->subjectscreator->removeElement($subjectscreator);
    }

    /**
     * Get subjectscreator
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectscreator()
    {
        return $this->subjectscreator;
    }

    /**
     * Add classesadministrator
     *
     * @param \DataBundle\Entity\Classes $classesadministrator
     *
     * @return Users
     */
    public function addClassesadministrator(\DataBundle\Entity\Classes $classesadministrator)
    {
        $this->classesadministrator[] = $classesadministrator;

        return $this;
    }

    /**
     * Remove classesadministrator
     *
     * @param \DataBundle\Entity\Classes $classesadministrator
     */
    public function removeClassesadministrator(\DataBundle\Entity\Classes $classesadministrator)
    {
        $this->classesadministrator->removeElement($classesadministrator);
    }

    /**
     * Get classesadministrator
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassesadministrator()
    {
        return $this->classesadministrator;
    }

    /**
     * Add course
     *
     * @param \DataBundle\Entity\Courses $course
     *
     * @return Users
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
     * Add post
     *
     * @param \DataBundle\Entity\Posts $post
     *
     * @return Users
     */
    public function addPost(\DataBundle\Entity\Posts $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \DataBundle\Entity\Posts $post
     */
    public function removePost(\DataBundle\Entity\Posts $post)
    {
        $this->posts->removeElement($post);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add comment
     *
     * @param \DataBundle\Entity\Comments $comment
     *
     * @return Users
     */
    public function addComment(\DataBundle\Entity\Comments $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \DataBundle\Entity\Comments $comment
     */
    public function removeComment(\DataBundle\Entity\Comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add schoolsteacher
     *
     * @param \DataBundle\Entity\SchoolsTeachers $schoolsteacher
     *
     * @return Users
     */
    public function addSchoolsteacher(\DataBundle\Entity\SchoolsTeachers $schoolsteacher)
    {
        $this->schoolsteachers[] = $schoolsteacher;

        return $this;
    }

    /**
     * Remove schoolsteacher
     *
     * @param \DataBundle\Entity\SchoolsTeachers $schoolsteacher
     */
    public function removeSchoolsteacher(\DataBundle\Entity\SchoolsTeachers $schoolsteacher)
    {
        $this->schoolsteachers->removeElement($schoolsteacher);
    }

    /**
     * Get schoolsteachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolsteachers()
    {
        return $this->schoolsteachers;
    }

    /**
     * Add teachingsubject
     *
     * @param \DataBundle\Entity\TeachingSubjects $teachingsubject
     *
     * @return Users
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
     * Add resource
     *
     * @param \DataBundle\Entity\Resources $resource
     *
     * @return Users
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
     * Add question
     *
     * @param \DataBundle\Entity\Questions $question
     *
     * @return Users
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
     * Add test
     *
     * @param \DataBundle\Entity\Tests $test
     *
     * @return Users
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
     * Add from
     *
     * @param \DataBundle\Entity\Transactions $from
     *
     * @return Users
     */
    public function addFrom(\DataBundle\Entity\Transactions $from)
    {
        $this->from[] = $from;

        return $this;
    }

    /**
     * Remove from
     *
     * @param \DataBundle\Entity\Transactions $from
     */
    public function removeFrom(\DataBundle\Entity\Transactions $from)
    {
        $this->from->removeElement($from);
    }

    /**
     * Get from
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Add to
     *
     * @param \DataBundle\Entity\Transactions $to
     *
     * @return Users
     */
    public function addTo(\DataBundle\Entity\Transactions $to)
    {
        $this->to[] = $to;

        return $this;
    }

    /**
     * Remove to
     *
     * @param \DataBundle\Entity\Transactions $to
     */
    public function removeTo(\DataBundle\Entity\Transactions $to)
    {
        $this->to->removeElement($to);
    }

    /**
     * Get to
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Add ip
     *
     * @param \DataBundle\Entity\Ips $ip
     *
     * @return Users
     */
    public function addIp(\DataBundle\Entity\Ips $ip)
    {
        $this->ips[] = $ip;

        return $this;
    }

    /**
     * Remove ip
     *
     * @param \DataBundle\Entity\Ips $ip
     */
    public function removeIp(\DataBundle\Entity\Ips $ip)
    {
        $this->ips->removeElement($ip);
    }

    /**
     * Get ips
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIps()
    {
        return $this->ips;
    }

    /**
     * Add image
     *
     * @param \DataBundle\Entity\Images $image
     *
     * @return Users
     */
    public function addImage(\DataBundle\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \DataBundle\Entity\Images $image
     */
    public function removeImage(\DataBundle\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add like
     *
     * @param \DataBundle\Entity\Likes $like
     *
     * @return Users
     */
    public function addLike(\DataBundle\Entity\Likes $like)
    {
        $this->likes[] = $like;

        return $this;
    }

    /**
     * Remove like
     *
     * @param \DataBundle\Entity\Likes $like
     */
    public function removeLike(\DataBundle\Entity\Likes $like)
    {
        $this->likes->removeElement($like);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add platform
     *
     * @param \DataBundle\Entity\Platforms $platform
     *
     * @return Users
     */
    public function addPlatform(\DataBundle\Entity\Platforms $platform)
    {
        $this->platforms[] = $platform;

        return $this;
    }

    /**
     * Remove platform
     *
     * @param \DataBundle\Entity\Platforms $platform
     */
    public function removePlatform(\DataBundle\Entity\Platforms $platform)
    {
        $this->platforms->removeElement($platform);
    }

    /**
     * Get platforms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * Add testsuser
     *
     * @param \DataBundle\Entity\TestsUsers $testsuser
     *
     * @return Users
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
     * Add notification
     *
     * @param \DataBundle\Entity\Notifications $notification
     *
     * @return Users
     */
    public function addNotification(\DataBundle\Entity\Notifications $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \DataBundle\Entity\Notifications $notification
     */
    public function removeNotification(\DataBundle\Entity\Notifications $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Add postsuser
     *
     * @param \DataBundle\Entity\PostsUsers $postsuser
     *
     * @return Users
     */
    public function addPostsuser(\DataBundle\Entity\PostsUsers $postsuser)
    {
        $this->postsusers[] = $postsuser;

        return $this;
    }

    /**
     * Remove postsuser
     *
     * @param \DataBundle\Entity\PostsUsers $postsuser
     */
    public function removePostsuser(\DataBundle\Entity\PostsUsers $postsuser)
    {
        $this->postsusers->removeElement($postsuser);
    }

    /**
     * Get postsusers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsusers()
    {
        return $this->postsusers;
    }

    /**
     * Add facultiesteacher
     *
     * @param \DataBundle\Entity\FacultiesTeachers $facultiesteacher
     *
     * @return Users
     */
    public function addFacultiesteacher(\DataBundle\Entity\FacultiesTeachers $facultiesteacher)
    {
        $this->facultiesteachers[] = $facultiesteacher;

        return $this;
    }

    /**
     * Remove facultiesteacher
     *
     * @param \DataBundle\Entity\FacultiesTeachers $facultiesteacher
     */
    public function removeFacultiesteacher(\DataBundle\Entity\FacultiesTeachers $facultiesteacher)
    {
        $this->facultiesteachers->removeElement($facultiesteacher);
    }

    /**
     * Get facultiesteachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesteachers()
    {
        return $this->facultiesteachers;
    }

    /**
     * Add departmentsteacher
     *
     * @param \DataBundle\Entity\DepartmentsTeachers $departmentsteacher
     *
     * @return Users
     */
    public function addDepartmentsteacher(\DataBundle\Entity\DepartmentsTeachers $departmentsteacher)
    {
        $this->departmentsteachers[] = $departmentsteacher;

        return $this;
    }

    /**
     * Remove departmentsteacher
     *
     * @param \DataBundle\Entity\DepartmentsTeachers $departmentsteacher
     */
    public function removeDepartmentsteacher(\DataBundle\Entity\DepartmentsTeachers $departmentsteacher)
    {
        $this->departmentsteachers->removeElement($departmentsteacher);
    }

    /**
     * Get departmentsteachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsteachers()
    {
        return $this->departmentsteachers;
    }

    /**
     * Add departmentsteachersvalidate
     *
     * @param \DataBundle\Entity\DepartmentsTeachers $departmentsteachersvalidate
     *
     * @return Users
     */
    public function addDepartmentsteachersvalidate(\DataBundle\Entity\DepartmentsTeachers $departmentsteachersvalidate)
    {
        $this->departmentsteachersvalidate[] = $departmentsteachersvalidate;

        return $this;
    }

    /**
     * Remove departmentsteachersvalidate
     *
     * @param \DataBundle\Entity\DepartmentsTeachers $departmentsteachersvalidate
     */
    public function removeDepartmentsteachersvalidate(\DataBundle\Entity\DepartmentsTeachers $departmentsteachersvalidate)
    {
        $this->departmentsteachersvalidate->removeElement($departmentsteachersvalidate);
    }

    /**
     * Get departmentsteachersvalidate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsteachersvalidate()
    {
        return $this->departmentsteachersvalidate;
    }

    /**
     * Add facultiesteachersvalidate
     *
     * @param \DataBundle\Entity\FacultiesTeachers $facultiesteachersvalidate
     *
     * @return Users
     */
    public function addFacultiesteachersvalidate(\DataBundle\Entity\FacultiesTeachers $facultiesteachersvalidate)
    {
        $this->facultiesteachersvalidate[] = $facultiesteachersvalidate;

        return $this;
    }

    /**
     * Remove facultiesteachersvalidate
     *
     * @param \DataBundle\Entity\FacultiesTeachers $facultiesteachersvalidate
     */
    public function removeFacultiesteachersvalidate(\DataBundle\Entity\FacultiesTeachers $facultiesteachersvalidate)
    {
        $this->facultiesteachersvalidate->removeElement($facultiesteachersvalidate);
    }

    /**
     * Get facultiesteachersvalidate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesteachersvalidate()
    {
        return $this->facultiesteachersvalidate;
    }

    /**
     * Add facultiesadministrator
     *
     * @param \DataBundle\Entity\Faculties $facultiesadministrator
     *
     * @return Users
     */
    public function addFacultiesadministrator(\DataBundle\Entity\Faculties $facultiesadministrator)
    {
        $this->facultiesadministrator[] = $facultiesadministrator;

        return $this;
    }

    /**
     * Remove facultiesadministrator
     *
     * @param \DataBundle\Entity\Faculties $facultiesadministrator
     */
    public function removeFacultiesadministrator(\DataBundle\Entity\Faculties $facultiesadministrator)
    {
        $this->facultiesadministrator->removeElement($facultiesadministrator);
    }

    /**
     * Get facultiesadministrator
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesadministrator()
    {
        return $this->facultiesadministrator;
    }

    /**
     * Add departmentsadministrator
     *
     * @param \DataBundle\Entity\Departments $departmentsadministrator
     *
     * @return Users
     */
    public function addDepartmentsadministrator(\DataBundle\Entity\Departments $departmentsadministrator)
    {
        $this->departmentsadministrator[] = $departmentsadministrator;

        return $this;
    }

    /**
     * Remove departmentsadministrator
     *
     * @param \DataBundle\Entity\Departments $departmentsadministrator
     */
    public function removeDepartmentsadministrator(\DataBundle\Entity\Departments $departmentsadministrator)
    {
        $this->departmentsadministrator->removeElement($departmentsadministrator);
    }

    /**
     * Get departmentsadministrator
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsadministrator()
    {
        return $this->departmentsadministrator;
    }

    /**
     * Add departmentsviceadministrator
     *
     * @param \DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator
     *
     * @return Users
     */
    public function addDepartmentsviceadministrator(\DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator)
    {
        $this->departmentsviceadministrators[] = $departmentsviceadministrator;

        return $this;
    }

    /**
     * Remove departmentsviceadministrator
     *
     * @param \DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator
     */
    public function removeDepartmentsviceadministrator(\DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministrator)
    {
        $this->departmentsviceadministrators->removeElement($departmentsviceadministrator);
    }

    /**
     * Get departmentsviceadministrators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsviceadministrators()
    {
        return $this->departmentsviceadministrators;
    }

    /**
     * Add facultiesviceadministrator
     *
     * @param \DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator
     *
     * @return Users
     */
    public function addFacultiesviceadministrator(\DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator)
    {
        $this->facultiesviceadministrators[] = $facultiesviceadministrator;

        return $this;
    }

    /**
     * Remove facultiesviceadministrator
     *
     * @param \DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator
     */
    public function removeFacultiesviceadministrator(\DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministrator)
    {
        $this->facultiesviceadministrators->removeElement($facultiesviceadministrator);
    }

    /**
     * Get facultiesviceadministrators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesviceadministrators()
    {
        return $this->facultiesviceadministrators;
    }

    /**
     * Add facultiesviceadministratorsvalidate
     *
     * @param \DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministratorsvalidate
     *
     * @return Users
     */
    public function addFacultiesviceadministratorsvalidate(\DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministratorsvalidate)
    {
        $this->facultiesviceadministratorsvalidate[] = $facultiesviceadministratorsvalidate;

        return $this;
    }

    /**
     * Remove facultiesviceadministratorsvalidate
     *
     * @param \DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministratorsvalidate
     */
    public function removeFacultiesviceadministratorsvalidate(\DataBundle\Entity\FacultiesViceAdministrators $facultiesviceadministratorsvalidate)
    {
        $this->facultiesviceadministratorsvalidate->removeElement($facultiesviceadministratorsvalidate);
    }

    /**
     * Get facultiesviceadministratorsvalidate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesviceadministratorsvalidate()
    {
        return $this->facultiesviceadministratorsvalidate;
    }

    /**
     * Add departmentsviceadministratorsvalidate
     *
     * @param \DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministratorsvalidate
     *
     * @return Users
     */
    public function addDepartmentsviceadministratorsvalidate(\DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministratorsvalidate)
    {
        $this->departmentsviceadministratorsvalidate[] = $departmentsviceadministratorsvalidate;

        return $this;
    }

    /**
     * Remove departmentsviceadministratorsvalidate
     *
     * @param \DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministratorsvalidate
     */
    public function removeDepartmentsviceadministratorsvalidate(\DataBundle\Entity\DepartmentsViceAdministrators $departmentsviceadministratorsvalidate)
    {
        $this->departmentsviceadministratorsvalidate->removeElement($departmentsviceadministratorsvalidate);
    }

    /**
     * Get departmentsviceadministratorsvalidate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartmentsviceadministratorsvalidate()
    {
        return $this->departmentsviceadministratorsvalidate;
    }

    /**
     * Add schoolsadministrator
     *
     * @param \DataBundle\Entity\Schools $schoolsadministrator
     *
     * @return Users
     */
    public function addSchoolsadministrator(\DataBundle\Entity\Schools $schoolsadministrator)
    {
        $this->schoolsadministrators[] = $schoolsadministrator;

        return $this;
    }

    /**
     * Remove schoolsadministrator
     *
     * @param \DataBundle\Entity\Schools $schoolsadministrator
     */
    public function removeSchoolsadministrator(\DataBundle\Entity\Schools $schoolsadministrator)
    {
        $this->schoolsadministrators->removeElement($schoolsadministrator);
    }

    /**
     * Get schoolsadministrators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolsadministrators()
    {
        return $this->schoolsadministrators;
    }

    /**
     * Set locations
     *
     * @param \DataBundle\Entity\Locations $locations
     *
     * @return Users
     */
    public function setLocations(\DataBundle\Entity\Locations $locations = null)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Get locations
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Set slugs
     *
     * @param \DataBundle\Entity\Slugs $slugs
     *
     * @return Users
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
    /**
     * @var string
     */
    private $username;

    /**
     * @var \DateTime
     */
    private $birthday;


    /**
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->email; 
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Users
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    /**
     * @var boolean
     */
    private $is_active;


    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Users
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function getRoles()
    {
        $roles[0]="ROLE_USER";
        if ($this->type=="teacher")
        {
            $roles[0]="ROLE_TEACHER";
        }
        if ($this->type=="student")
        {
            $roles[0]="ROLE_STUDENT";
        }
        return $roles; 
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $coursesstudents;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classesstudents;


    /**
     * Add coursesstudent
     *
     * @param \DataBundle\Entity\CoursesStudents $coursesstudent
     *
     * @return Users
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
     * Add classesstudent
     *
     * @param \DataBundle\Entity\ClassesStudents $classesstudent
     *
     * @return Users
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
     * @var string
     * @Groups({"basic","full"})
     */
    private $token;


    /**
     * Set token
     *
     * @param string $token
     *
     * @return Users
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
    

    /**
     * Add file
     *
     * @param \DataBundle\Entity\Files $file
     *
     * @return Users
     */
    public function addFile(\DataBundle\Entity\Files $file)
    {
        $this->files[] = $file;

        return $this;
    } 

    /**
     * Remove file
     *
     * @param \DataBundle\Entity\Files $file
     */
    public function removeFile(\DataBundle\Entity\Files $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles()
    {
        return $this->files;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $files;

    public function isEqualTo(UserInterface $user)
    {
        return $this->id === $user->getId();
    }
}
