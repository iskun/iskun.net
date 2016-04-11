<?php

namespace DataBundle\Entity;

/**
 * Tblcollaborator
 */
class Tblcollaborator
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $full_name;

    /**
     * @var string
     */
    private $login_name;

    /**
     * @var string
     */
    private $cellphone;

    /**
     * @var string
     */
    private $passwd;

    /**
     * @var integer
     */
    private $activated;

    /**
     * @var string
     */
    private $created_time;

    /**
     * @var string
     */
    private $updated_time;

    /**
     * @var integer
     */
    private $author;


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
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Tblcollaborator
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set loginName
     *
     * @param string $loginName
     *
     * @return Tblcollaborator
     */
    public function setLoginName($loginName)
    {
        $this->login_name = $loginName;

        return $this;
    }

    /**
     * Get loginName
     *
     * @return string
     */
    public function getLoginName()
    {
        return $this->login_name;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     *
     * @return Tblcollaborator
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set passwd
     *
     * @param string $passwd
     *
     * @return Tblcollaborator
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set activated
     *
     * @param integer $activated
     *
     * @return Tblcollaborator
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * Get activated
     *
     * @return integer
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set createdTime
     *
     * @param string $createdTime
     *
     * @return Tblcollaborator
     */
    public function setCreatedTime($createdTime)
    {
        $this->created_time = $createdTime;

        return $this;
    }

    /**
     * Get createdTime
     *
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    /**
     * Set updatedTime
     *
     * @param string $updatedTime
     *
     * @return Tblcollaborator
     */
    public function setUpdatedTime($updatedTime)
    {
        $this->updated_time = $updatedTime;

        return $this;
    }

    /**
     * Get updatedTime
     *
     * @return string
     */
    public function getUpdatedTime()
    {
        return $this->updated_time;
    }

    /**
     * Set author
     *
     * @param integer $author
     *
     * @return Tblcollaborator
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
