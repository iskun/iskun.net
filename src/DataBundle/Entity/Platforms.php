<?php

namespace DataBundle\Entity;

/**
 * Platforms
 */
class Platforms
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $browser;

    /**
     * @var string
     */
    private $browser_version;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $platform;

    /**
     * @var integer
     */
    private $is_mobile;

    /**
     * @var string
     */
    private $full_info;

    /**
     * @var integer
     */
    private $is_robot;

    /**
     * @var string
     */
    private $robot;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $users;


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
     * Set ip
     *
     * @param string $ip
     *
     * @return Platforms
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set browser
     *
     * @param string $browser
     *
     * @return Platforms
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set browserVersion
     *
     * @param string $browserVersion
     *
     * @return Platforms
     */
    public function setBrowserVersion($browserVersion)
    {
        $this->browser_version = $browserVersion;

        return $this;
    }

    /**
     * Get browserVersion
     *
     * @return string
     */
    public function getBrowserVersion()
    {
        return $this->browser_version;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Platforms
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set platform
     *
     * @param string $platform
     *
     * @return Platforms
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set isMobile
     *
     * @param integer $isMobile
     *
     * @return Platforms
     */
    public function setIsMobile($isMobile)
    {
        $this->is_mobile = $isMobile;

        return $this;
    }

    /**
     * Get isMobile
     *
     * @return integer
     */
    public function getIsMobile()
    {
        return $this->is_mobile;
    }

    /**
     * Set fullInfo
     *
     * @param string $fullInfo
     *
     * @return Platforms
     */
    public function setFullInfo($fullInfo)
    {
        $this->full_info = $fullInfo;

        return $this;
    }

    /**
     * Get fullInfo
     *
     * @return string
     */
    public function getFullInfo()
    {
        return $this->full_info;
    }

    /**
     * Set isRobot
     *
     * @param integer $isRobot
     *
     * @return Platforms
     */
    public function setIsRobot($isRobot)
    {
        $this->is_robot = $isRobot;

        return $this;
    }

    /**
     * Get isRobot
     *
     * @return integer
     */
    public function getIsRobot()
    {
        return $this->is_robot;
    }

    /**
     * Set robot
     *
     * @param string $robot
     *
     * @return Platforms
     */
    public function setRobot($robot)
    {
        $this->robot = $robot;

        return $this;
    }

    /**
     * Get robot
     *
     * @return string
     */
    public function getRobot()
    {
        return $this->robot;
    }

    /**
     * Set users
     *
     * @param \DataBundle\Entity\Users $users
     *
     * @return Platforms
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
}
