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
 * PostsSubjects
 */
class PostsSubjects
{
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var integer
     */
    private $sharing;

    /**
     * @var string
     */
    private $follow;

    /**
     * @var string
     */
    private $un_follow;

    /**
     * @var \DataBundle\Entity\Posts
     * @Groups({"basic"}) 
     */
    private $posts;

    /**
     * @var \DataBundle\Entity\Subjects
     * @Groups({"basic"}) 
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\SubjectsChapters
     * @Groups({"basic"}) 
     */
    private $subjectschapters;


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
     * Set visible
     *
     * @param integer $visible
     *
     * @return PostsSubjects
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set sharing
     *
     * @param integer $sharing
     *
     * @return PostsSubjects
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
     * Set follow
     *
     * @param string $follow
     *
     * @return PostsSubjects
     */
    public function setFollow($follow)
    {
        $this->follow = $follow;

        return $this;
    }

    /**
     * Get follow
     *
     * @return string
     */
    public function getFollow()
    {
        return $this->follow;
    }

    /**
     * Set unFollow
     *
     * @param string $unFollow
     *
     * @return PostsSubjects
     */
    public function setUnFollow($unFollow)
    {
        $this->un_follow = $unFollow;

        return $this;
    }

    /**
     * Get unFollow
     *
     * @return string
     */
    public function getUnFollow()
    {
        return $this->un_follow;
    }

    /**
     * Set posts
     *
     * @param \DataBundle\Entity\Posts $posts
     *
     * @return PostsSubjects
     */
    public function setPosts(\DataBundle\Entity\Posts $posts = null)
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     * Get posts
     *
     * @return \DataBundle\Entity\Posts
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return PostsSubjects
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
     * @return PostsSubjects
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
}
