<?php

namespace DataBundle\Entity;

/**
 * Province
 */
class Province
{
    /**
     * @var integer
     */
    private $provinceid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $district;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->district = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set provinceid
     *
     * @param integer $provinceid
     *
     * @return Province
     */
    public function setProvinceid($provinceid)
    {
        $this->provinceid = $provinceid;

        return $this;
    }

    /**
     * Get provinceid
     *
     * @return integer
     */
    public function getProvinceid()
    {
        return $this->provinceid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Province
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
     * @return Province
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
     * Add district
     *
     * @param \DataBundle\Entity\District $district
     *
     * @return Province
     */
    public function addDistrict(\DataBundle\Entity\District $district)
    {
        $this->district[] = $district;

        return $this;
    }

    /**
     * Remove district
     *
     * @param \DataBundle\Entity\District $district
     */
    public function removeDistrict(\DataBundle\Entity\District $district)
    {
        $this->district->removeElement($district);
    }

    /**
     * Get district
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDistrict()
    {
        return $this->district;
    }
}
