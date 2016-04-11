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
 * PostsFiles
 */
class PostsFiles
{
    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $id;

    /**
     * @var integer
     * @Groups({"basic"}) 
     */
    private $visible;

    /**
     * @var integer
     * @Groups({"basic"}) 
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
     */
    private $posts;

    /**
     * @var \DataBundle\Entity\Files
     * @Groups({"basic"}) 
     */
    private $files;


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
     * @return PostsFiles
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
     * @return PostsFiles
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
     * @return PostsFiles
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
     * @return PostsFiles
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
     * @return PostsFiles
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
     * Set files
     *
     * @param \DataBundle\Entity\Files $files
     *
     * @return PostsFiles
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
}
