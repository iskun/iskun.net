<?php

namespace DataBundle\Entity;

/**
 * Attachmentstargets
 */
class Attachmentstargets
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $target;

    /**
     * @var string
     */
    private $entity;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DataBundle\Entity\Attachments
     */
    private $attachments;


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
     * Set target
     *
     * @param integer $target
     *
     * @return Attachmentstargets
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return integer
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set entity
     *
     * @param string $entity
     *
     * @return Attachmentstargets
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Attachmentstargets
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
     * Set attachments
     *
     * @param \DataBundle\Entity\Attachments $attachments
     *
     * @return Attachmentstargets
     */
    public function setAttachments(\DataBundle\Entity\Attachments $attachments = null)
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * Get attachments
     *
     * @return \DataBundle\Entity\Attachments
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
}
