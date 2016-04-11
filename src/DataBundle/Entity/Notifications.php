<?php

namespace DataBundle\Entity;

/**
 * Notifications
 */
class Notifications
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $time;

    /**
     * @var integer
     */
    private $read;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notificationsdatas;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;

    /**
     * @var \DataBundle\Entity\NotificationsTypes
     */
    private $notificationstypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notificationsdatas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set time
     *
     * @param integer $time
     *
     * @return Notifications
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
     * Set read
     *
     * @param integer $read
     *
     * @return Notifications
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return integer
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Add notificationsdata
     *
     * @param \DataBundle\Entity\NotificationsDatas $notificationsdata
     *
     * @return Notifications
     */
    public function addNotificationsdata(\DataBundle\Entity\NotificationsDatas $notificationsdata)
    {
        $this->notificationsdatas[] = $notificationsdata;

        return $this;
    }

    /**
     * Remove notificationsdata
     *
     * @param \DataBundle\Entity\NotificationsDatas $notificationsdata
     */
    public function removeNotificationsdata(\DataBundle\Entity\NotificationsDatas $notificationsdata)
    {
        $this->notificationsdatas->removeElement($notificationsdata);
    }

    /**
     * Get notificationsdatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotificationsdatas()
    {
        return $this->notificationsdatas;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Notifications
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
     * Set notificationstypes
     *
     * @param \DataBundle\Entity\NotificationsTypes $notificationstypes
     *
     * @return Notifications
     */
    public function setNotificationstypes(\DataBundle\Entity\NotificationsTypes $notificationstypes = null)
    {
        $this->notificationstypes = $notificationstypes;

        return $this;
    }

    /**
     * Get notificationstypes
     *
     * @return \DataBundle\Entity\NotificationsTypes
     */
    public function getNotificationstypes()
    {
        return $this->notificationstypes;
    }
}
