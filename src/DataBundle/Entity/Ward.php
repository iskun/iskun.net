<?php

namespace DataBundle\Entity;

/**
 * Ward
 */
class Ward
{
    /**
     * @var integer
     */
    private $wardid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $location;

    /**
     * @var \DataBundle\Entity\District
     */
    private $district;


    /**
     * Set wardid
     *
     * @param integer $wardid
     *
     * @return Ward
     */
    public function setWardid($wardid)
    {
        $this->wardid = $wardid;

        return $this;
    }

    /**
     * Get wardid
     *
     * @return integer
     */
    public function getWardid()
    {
        return $this->wardid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ward
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
     * Set type
     *
     * @param string $type
     *
     * @return Ward
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
     * Set location
     *
     * @param string $location
     *
     * @return Ward
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set district
     *
     * @param \DataBundle\Entity\District $district
     *
     * @return Ward
     */
    public function setDistrict(\DataBundle\Entity\District $district = null)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return \DataBundle\Entity\District
     */
    public function getDistrict()
    {
        return $this->district;
    }
}
