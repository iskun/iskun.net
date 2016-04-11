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
 * StagesSubjects
 */
class StagesSubjects
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
    private $status;

    /**
     * @var \DataBundle\Entity\Stages
     */
    private $stages;

    /**
     * @var \DataBundle\Entity\Subjects
     * @Groups({"basic","full"}) 
     */
    private $subjects;


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
     * Set status
     *
     * @param string $status
     *
     * @return StagesSubjects
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set stages
     *
     * @param \DataBundle\Entity\Stages $stages
     *
     * @return StagesSubjects
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

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return StagesSubjects
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
}
