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
 * Stages
 */
class Stages
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
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Groups({"basic","full"}) 
     */
    private $stagessubjects;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stagessubjects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Stages
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
     * Set description
     *
     * @param string $description
     *
     * @return Stages
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
     * Add stagessubject
     *
     * @param \DataBundle\Entity\StagesSubjects $stagessubject
     *
     * @return Stages
     */
    public function addStagessubject(\DataBundle\Entity\StagesSubjects $stagessubject)
    {
        $this->stagessubjects[] = $stagessubject;

        return $this;
    }

    /**
     * Remove stagessubject
     *
     * @param \DataBundle\Entity\StagesSubjects $stagessubject
     */
    public function removeStagessubject(\DataBundle\Entity\StagesSubjects $stagessubject)
    {
        $this->stagessubjects->removeElement($stagessubject);
    }

    /**
     * Get stagessubjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStagessubjects()
    {
        return $this->stagessubjects;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $grades;


    /**
     * Add grade
     *
     * @param \DataBundle\Entity\Grades $grade
     *
     * @return Stages
     */
    public function addGrade(\DataBundle\Entity\Grades $grade)
    {
        $this->grades[] = $grade;

        return $this;
    }

    /**
     * Remove grade
     *
     * @param \DataBundle\Entity\Grades $grade
     */
    public function removeGrade(\DataBundle\Entity\Grades $grade)
    {
        $this->grades->removeElement($grade);
    }

    /**
     * Get grades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrades()
    {
        return $this->grades;
    }
}
