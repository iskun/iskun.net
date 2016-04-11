<?php

namespace DataBundle\Entity;

/**
 * NotificationsDatas
 */
class NotificationsDatas
{
    /**
     * @var integer
     */
    private $nd_id;

    /**
     * @var string
     */
    private $datindex;

    /**
     * @var string
     */
    private $datvalue;

    /**
     * @var \DataBundle\Entity\Notifications
     */
    private $notifications;


    /**
     * Get ndId
     *
     * @return integer
     */
    public function getNdId()
    {
        return $this->nd_id;
    }

    /**
     * Set datindex
     *
     * @param string $datindex
     *
     * @return NotificationsDatas
     */
    public function setDatindex($datindex)
    {
        $this->datindex = $datindex;

        return $this;
    }

    /**
     * Get datindex
     *
     * @return string
     */
    public function getDatindex()
    {
        return $this->datindex;
    }

    /**
     * Set datvalue
     *
     * @param string $datvalue
     *
     * @return NotificationsDatas
     */
    public function setDatvalue($datvalue)
    {
        $this->datvalue = $datvalue;

        return $this;
    }

    /**
     * Get datvalue
     *
     * @return string
     */
    public function getDatvalue()
    {
        return $this->datvalue;
    }

    /**
     * Set notifications
     *
     * @param \DataBundle\Entity\Notifications $notifications
     *
     * @return NotificationsDatas
     */
    public function setNotifications(\DataBundle\Entity\Notifications $notifications = null)
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Get notifications
     *
     * @return \DataBundle\Entity\Notifications
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}
