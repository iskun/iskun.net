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
 * Grades
 */
class Grades
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
     * @Groups({"basic","full"}) 
     */
    private $url;

    /**
     * @var string
     * @Groups({"basic","full"}) 
     */
    private $color;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subjects;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolstypesgrades;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subjects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->classes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolstypesgrades = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Grades
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
     * @return Grades
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
     * Set color
     *
     * @param string $color
     *
     * @return Grades
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
     * Add subject
     *
     * @param \DataBundle\Entity\Subjects $subject
     *
     * @return Grades
     */
    public function addSubject(\DataBundle\Entity\Subjects $subject)
    {
        $this->subjects[] = $subject;

        return $this;
    }

    /**
     * Remove subject
     *
     * @param \DataBundle\Entity\Subjects $subject
     */
    public function removeSubject(\DataBundle\Entity\Subjects $subject)
    {
        $this->subjects->removeElement($subject);
    }

    /**
     * Get subjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Add class
     *
     * @param \DataBundle\Entity\Classes $class
     *
     * @return Grades
     */
    public function addClass(\DataBundle\Entity\Classes $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \DataBundle\Entity\Classes $class
     */
    public function removeClass(\DataBundle\Entity\Classes $class)
    {
        $this->classes->removeElement($class);
    }

    /**
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Add schoolstypesgrade
     *
     * @param \DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade
     *
     * @return Grades
     */
    public function addSchoolstypesgrade(\DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade)
    {
        $this->schoolstypesgrades[] = $schoolstypesgrade;

        return $this;
    }

    /**
     * Remove schoolstypesgrade
     *
     * @param \DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade
     */
    public function removeSchoolstypesgrade(\DataBundle\Entity\SchoolsTypesGrades $schoolstypesgrade)
    {
        $this->schoolstypesgrades->removeElement($schoolstypesgrade);
    }

    /**
     * Get schoolstypesgrades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolstypesgrades()
    {
        return $this->schoolstypesgrades;
    }
    /**
     * @var \DataBundle\Entity\Stages
     */
    private $stages;


    /**
     * Set stages
     *
     * @param \DataBundle\Entity\Stages $stages
     *
     * @return Grades
     */
    public function setStages(\DataBundle\Entity\Stages $stages = null)
    {
        $this->stages = $stages;

        return $this;
    }

    /**
     * Get stages
     *
     * @return \DataBundle\Entity\Stages
     */
    public function getStages()
    {
        return $this->stages;
    }
}
