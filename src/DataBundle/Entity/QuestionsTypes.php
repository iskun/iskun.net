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
 * QuestionsTypes
 */
class QuestionsTypes
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
     */
    private $url;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $tutotial;

    /**
     * @var boolean
     */
    private $marktype;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $children;

    /**
     * @var \DataBundle\Entity\QuestionsTypes
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return QuestionsTypes
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
     * @return QuestionsTypes
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
     * Set description
     *
     * @param string $description
     *
     * @return QuestionsTypes
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
     * Set tutotial
     *
     * @param string $tutotial
     *
     * @return QuestionsTypes
     */
    public function setTutotial($tutotial)
    {
        $this->tutotial = $tutotial;

        return $this;
    }

    /**
     * Get tutotial
     *
     * @return string
     */
    public function getTutotial()
    {
        return $this->tutotial;
    }

    /**
     * Set marktype
     *
     * @param boolean $marktype
     *
     * @return QuestionsTypes
     */
    public function setMarktype($marktype)
    {
        $this->marktype = $marktype;

        return $this;
    }

    /**
     * Get marktype
     *
     * @return boolean
     */
    public function getMarktype()
    {
        return $this->marktype;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return QuestionsTypes
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
     * Set type
     *
     * @param string $type
     *
     * @return QuestionsTypes
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
     * Add question
     *
     * @param \DataBundle\Entity\Questions $question
     *
     * @return QuestionsTypes
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
     * Add child
     *
     * @param \DataBundle\Entity\QuestionsTypes $child
     *
     * @return QuestionsTypes
     */
    public function addChild(\DataBundle\Entity\QuestionsTypes $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \DataBundle\Entity\QuestionsTypes $child
     */
    public function removeChild(\DataBundle\Entity\QuestionsTypes $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \DataBundle\Entity\QuestionsTypes $parent
     *
     * @return QuestionsTypes
     */
    public function setParent(\DataBundle\Entity\QuestionsTypes $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \DataBundle\Entity\QuestionsTypes
     */
    public function getParent()
    {
        return $this->parent;
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
     * @return QuestionsTypes
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
     * @Groups({"basic","full"})    
     */
    private $icon;


    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return QuestionsTypes
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
