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
 * CommentsFiles
 */
class CommentsFiles
{
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Files
     * @Groups({"basic"}) 
     */
    private $files;

    /**
     * @var \DataBundle\Entity\Comments
     */
    private $comments;


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
     * Set files
     *
     * @param \DataBundle\Entity\Files $files
     *
     * @return CommentsFiles
     */
    public function setFiles(\DataBundle\Entity\Files $files = null)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * Get files
     *
     * @return \DataBundle\Entity\Files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Set comments
     *
     * @param \DataBundle\Entity\Comments $comments
     *
     * @return CommentsFiles
     */
    public function setComments(\DataBundle\Entity\Comments $comments = null)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return \DataBundle\Entity\Comments
     */
    public function getComments()
    {
        return $this->comments;
    }
}
