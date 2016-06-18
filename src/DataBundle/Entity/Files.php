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
 * Files
 */
class Files
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
    private $filename;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $format;

    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $thumbnail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commentsfiles;

    /**
     * @var \DataBundle\Entity\Users
     * @Groups({"basic"}) 
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentsfiles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set filename
     *
     * @param string $filename
     *
     * @return Files
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Files
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return Files
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
     * Add commentsfile
     *
     * @param \DataBundle\Entity\CommentsFiles $commentsfile
     *
     * @return Files
     */
    public function addCommentsfile(\DataBundle\Entity\CommentsFiles $commentsfile)
    {
        $this->commentsfiles[] = $commentsfile;

        return $this;
    }

    /**
     * Remove commentsfile
     *
     * @param \DataBundle\Entity\CommentsFiles $commentsfile
     */
    public function removeCommentsfile(\DataBundle\Entity\CommentsFiles $commentsfile)
    {
        $this->commentsfiles->removeElement($commentsfile);
    }

    /**
     * Get commentsfiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentsfiles()
    {
        return $this->commentsfiles;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Files
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
     * @var string
     * @Groups({"basic"}) 
     */
    private $filepath;


    /**
     * Set filepath
     *
     * @param string $filepath
     *
     * @return Files
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }

    /**
     * Get filepath
     *
     * @return string
     */
    public function getFilepath()
    {
        return $this->filepath;
    }
    /**
     * @var integer
     */
    private $size;


    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Files
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }
  

    /**
     * Set create
     *
     * @param integer $create
     *
     * @return Files
     */
    public function setCreate($create)
    {
        $this->create = $create;

        return $this;
    }

    /**
     * Get create
     *
     * @return integer
     */
    public function getCreate()
    {
        return $this->create;
    }
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $time;


    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Files
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
     * @var \DataBundle\Entity\FilesFormats
     */
    private $filesformats;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\SubjectsChapters
     */
    private $subjectschapters;


    /**
     * Set filesformats
     *
     * @param \DataBundle\Entity\FilesFormats $filesformats
     *
     * @return Files
     */
    public function setFilesformats(\DataBundle\Entity\FilesFormats $filesformats = null)
    {
        $this->filesformats = $filesformats;

        return $this;
    }

    /**
     * Get filesformats
     *
     * @return \DataBundle\Entity\FilesFormats
     */
    public function getFilesformats()
    {
        return $this->filesformats;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return Files
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
     * @return Files
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
     * @var \DataBundle\Entity\FilesCategories
     */
    private $filescategories;


    /**
     * Set filescategories
     *
     * @param \DataBundle\Entity\FilesCategories $filescategories
     *
     * @return Files
     */
    public function setFilescategories(\DataBundle\Entity\FilesCategories $filescategories = null)
    {
        $this->filescategories = $filescategories;

        return $this;
    }

    /**
     * Get filescategories
     *
     * @return \DataBundle\Entity\FilesCategories
     */
    public function getFilescategories()
    {
        return $this->filescategories;
    }
    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Files
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
     * @var integer
     */
    private $comments;

    /**
     * @var integer
     */
    private $likes;


    /**
     * Set comments
     *
     * @param integer $comments
     *
     * @return Files
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return integer
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     *
     * @return Files
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer
     */
    public function getLikes()
    {
        return $this->likes;
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
     * @return Files
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
     * @return Files
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

    /**
     * Add comment
     *
     * @param \DataBundle\Entity\Comments $comment
     *
     * @return Files
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
     * @var string
     * @Groups({"basic"}) 
     */
    private $extension;


    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Files
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic"})  
     */
    private $previews;


    /**
     * Add preview
     *
     * @param \DataBundle\Entity\Previews $preview
     *
     * @return Files
     */
    public function addPreview(\DataBundle\Entity\Previews $preview)
    {
        $this->previews[] = $preview;

        return $this;
    }

    /**
     * Remove preview
     *
     * @param \DataBundle\Entity\Previews $preview
     */
    public function removePreview(\DataBundle\Entity\Previews $preview)
    {
        $this->previews->removeElement($preview);
    }

    /**
     * Get previews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPreviews()
    {
        return $this->previews;
    }
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $pages;


    /**
     * Set pages
     *
     * @param integer $pages
     *
     * @return Files
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return integer
     */
    public function getPages()
    {
        return $this->pages;
    }
    /**
     * @var integer
     */
    private $is_previewed;


    /**
     * Set isPreviewed
     *
     * @param integer $isPreviewed
     *
     * @return Files
     */
    public function setIsPreviewed($isPreviewed)
    {
        $this->is_previewed = $isPreviewed;

        return $this;
    }

    /**
     * Get isPreviewed
     *
     * @return integer
     */
    public function getIsPreviewed()
    {
        return $this->is_previewed;
    }
}
