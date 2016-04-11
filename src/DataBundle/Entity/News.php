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
 * News
 */
class News
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
    private $title;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $intro;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $content;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $time;

    /**
     * @var \DataBundle\Entity\NewsCategories
     * @Groups({"basic","full"}) 
     */
    private $newscategories;


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
     * Set title
     *
     * @param string $title
     *
     * @return News
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
     * Set intro
     *
     * @param string $intro
     *
     * @return News
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return News
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
     * @return News
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
     * Set newscategories
     *
     * @param \DataBundle\Entity\NewsCategories $newscategories
     *
     * @return News
     */
    public function setNewscategories(\DataBundle\Entity\NewsCategories $newscategories = null)
    {
        $this->newscategories = $newscategories;

        return $this;
    }

    /**
     * Get newscategories
     *
     * @return \DataBundle\Entity\NewsCategories
     */
    public function getNewscategories()
    {
        return $this->newscategories;
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
     * @return News
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
}
