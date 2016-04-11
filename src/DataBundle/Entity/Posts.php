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
 * Posts
 */
class Posts
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
    private $ip;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $likers;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $content;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $time;

    /**
     * @var integer
     */
    private $lastedit;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $postsusers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $postscourses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $poststests;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $postsclasses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $likes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postsdatas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $postsimages;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic"}) 
     */
    private $users;

    /**
     * @var \DataBundle\Entity\PostsTypes
     * @Groups({"basic"})  
     */
    private $poststypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postsusers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postscourses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->poststests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postsclasses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postsdatas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postsimages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ip
     *
     * @param string $ip
     *
     * @return Posts
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set likers
     *
     * @param string $likers
     *
     * @return Posts
     */
    public function setLikers($likers)
    {
        $this->likers = $likers;

        return $this;
    }

    /**
     * Get likers
     *
     * @return string
     */
    public function getLikers()
    {
        return $this->likers;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Posts
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
     * Set time
     *
     * @param string $time
     *
     * @return Posts
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set lastedit
     *
     * @param integer $lastedit
     *
     * @return Posts
     */
    public function setLastedit($lastedit)
    {
        $this->lastedit = $lastedit;

        return $this;
    }

    /**
     * Get lastedit
     *
     * @return integer
     */
    public function getLastedit()
    {
        return $this->lastedit;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Posts
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
     * Add postsuser
     *
     * @param \DataBundle\Entity\PostsUsers $postsuser
     *
     * @return Posts
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
     * Add postscourse
     *
     * @param \DataBundle\Entity\PostsCourses $postscourse
     *
     * @return Posts
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
     * Add poststest
     *
     * @param \DataBundle\Entity\PostsTests $poststest
     *
     * @return Posts
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
     * Add postsclass
     *
     * @param \DataBundle\Entity\PostsClasses $postsclass
     *
     * @return Posts
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
     * Add comment
     *
     * @param \DataBundle\Entity\Comments $comment
     *
     * @return Posts
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
     * Add like
     *
     * @param \DataBundle\Entity\Likes $like
     *
     * @return Posts
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
     * Add postsdata
     *
     * @param \DataBundle\Entity\PostsDatas $postsdata
     *
     * @return Posts
     */
    public function addPostsdata(\DataBundle\Entity\PostsDatas $postsdata)
    {
        $this->postsdatas[] = $postsdata;

        return $this;
    }

    /**
     * Remove postsdata
     *
     * @param \DataBundle\Entity\PostsDatas $postsdata
     */
    public function removePostsdata(\DataBundle\Entity\PostsDatas $postsdata)
    {
        $this->postsdatas->removeElement($postsdata);
    }

    /**
     * Get postsdatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsdatas()
    {
        return $this->postsdatas;
    }

    /**
     * Add postsimage
     *
     * @param \DataBundle\Entity\PostsImages $postsimage
     *
     * @return Posts
     */
    public function addPostsimage(\DataBundle\Entity\PostsImages $postsimage)
    {
        $this->postsimages[] = $postsimage;

        return $this;
    }

    /**
     * Remove postsimage
     *
     * @param \DataBundle\Entity\PostsImages $postsimage
     */
    public function removePostsimage(\DataBundle\Entity\PostsImages $postsimage)
    {
        $this->postsimages->removeElement($postsimage);
    }

    /**
     * Get postsimages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsimages()
    {
        return $this->postsimages;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Posts
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
     * Set poststypes
     *
     * @param \DataBundle\Entity\PostsTypes $poststypes
     *
     * @return Posts
     */
    public function setPoststypes(\DataBundle\Entity\PostsTypes $poststypes = null)
    {
        $this->poststypes = $poststypes;

        return $this;
    }

    /**
     * Get poststypes
     *
     * @return \DataBundle\Entity\PostsTypes
     */
    public function getPoststypes()
    {
        return $this->poststypes;
    }
    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $title;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Posts
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
     * @var integer
     * @Groups({"basic"}) 
     */
    private $commentsnumber;


    /**
     * Set commentsnumber
     *
     * @param integer $commentsnumber
     *
     * @return Posts
     */
    public function setCommentsnumber($commentsnumber)
    {
        $this->commentsnumber = $commentsnumber;

        return $this;
    }

    /**
     * Get commentsnumber
     *
     * @return integer
     */
    public function getCommentsnumber()
    {
        return $this->commentsnumber;
    }
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $likesnumber;


    /**
     * Set likesnumber
     *
     * @param integer $likesnumber
     *
     * @return Posts
     */
    public function setLikesnumber($likesnumber)
    {
        $this->likesnumber = $likesnumber;

        return $this;
    }

    /**
     * Get likesnumber
     *
     * @return integer
     */
    public function getLikesnumber()
    {
        return $this->likesnumber;
    }
    /**
     * @var \DataBundle\Entity\Sharings
     * @Groups({"basic"}) 
     */
    private $sharings;


    /**
     * Set sharings
     *
     * @param \DataBundle\Entity\Sharings $sharings
     *
     * @return Posts
     */
    public function setSharings(\DataBundle\Entity\Sharings $sharings = null)
    {
        $this->sharings = $sharings;

        return $this;
    }

    /**
     * Get sharings
     *
     * @return \DataBundle\Entity\Sharings
     */
    public function getSharings()
    {
        return $this->sharings;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $postsfiles;


    /**
     * Add postsfile
     *
     * @param \DataBundle\Entity\PostsFiles $postsfile
     *
     * @return Posts
     */
    public function addPostsfile(\DataBundle\Entity\PostsFiles $postsfile)
    {
        $this->postsfiles[] = $postsfile;

        return $this; 
    }

    /**
     * Remove postsfile
     *
     * @param \DataBundle\Entity\PostsFiles $postsfile
     */
    public function removePostsfile(\DataBundle\Entity\PostsFiles $postsfile)
    {
        $this->postsfiles->removeElement($postsfile);
    }

    /**
     * Get postsfiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsfiles()
    {
        return $this->postsfiles;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"}) 
     */
    private $postssubjects; 


    /**
     * Add postssubject
     *
     * @param \DataBundle\Entity\PostsSubjects $postssubject
     *
     * @return Posts
     */
    public function addPostssubject(\DataBundle\Entity\PostsSubjects $postssubject)
    {
        $this->postssubjects[] = $postssubject;

        return $this;
    }

    /**
     * Remove postssubject
     *
     * @param \DataBundle\Entity\PostsSubjects $postssubject
     */
    public function removePostssubject(\DataBundle\Entity\PostsSubjects $postssubject)
    {
        $this->postssubjects->removeElement($postssubject);
    }

    /**
     * Get postssubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostssubjects()
    {
        return $this->postssubjects;
    }
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $commentsnumbers;

    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $likesnumbers;


    /**
     * Set commentsnumbers
     *
     * @param integer $commentsnumbers
     *
     * @return Posts
     */
    public function setCommentsnumbers($commentsnumbers)
    {
        $this->commentsnumbers = $commentsnumbers;

        return $this;
    }

    /**
     * Get commentsnumbers
     *
     * @return integer
     */
    public function getCommentsnumbers()
    {
        return $this->commentsnumbers;
    }

    /**
     * Set likesnumbers
     *
     * @param integer $likesnumbers
     *
     * @return Posts
     */
    public function setLikesnumbers($likesnumbers)
    {
        $this->likesnumbers = $likesnumbers;

        return $this;
    }

    /**
     * Get likesnumbers
     *
     * @return integer
     */
    public function getLikesnumbers()
    {
        return $this->likesnumbers;
    }
}
