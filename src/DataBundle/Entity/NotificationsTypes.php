<?php

namespace DataBundle\Entity;

/**
 * NotificationsTypes
 */
class NotificationsTypes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $default_message;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notifications;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notifications = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return NotificationsTypes
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
     * Set message
     *
     * @param string $message
     *
     * @return NotificationsTypes
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set defaultMessage
     *
     * @param string $defaultMessage
     *
     * @return NotificationsTypes
     */
    public function setDefaultMessage($defaultMessage)
    {
        $this->default_message = $defaultMessage;

        return $this;
    }

    /**
     * Get defaultMessage
     *
     * @return string
     */
    public function getDefaultMessage()
    {
        return $this->default_message;
    }

    /**
     * Add notification
     *
     * @param \DataBundle\Entity\Notifications $notification
     *
     * @return NotificationsTypes
     */
    public function addNotification(\DataBundle\Entity\Notifications $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \DataBundle\Entity\Notifications $notification
     */
    public function removeNotification(\DataBundle\Entity\Notifications $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}
