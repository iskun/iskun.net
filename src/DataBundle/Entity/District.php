<?php

namespace DataBundle\Entity;

/**
 * District
 */
class District
{
    /**
     * @var integer
     */
    private $districtid;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ward;

    /**
     * @var \DataBundle\Entity\Province
     */
    private $province;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ward = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set districtid
     *
     * @param integer $districtid
     *
     * @return District
     */
    public function setDistrictid($districtid)
    {
        $this->districtid = $districtid;

        return $this;
    }

    /**
     * Get districtid
     *
     * @return integer
     */
    public function getDistrictid()
    {
        return $this->districtid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return District
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
     * @return District
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
     * @return District
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
     * Add ward
     *
     * @param \DataBundle\Entity\Ward $ward
     *
     * @return District
     */
    public function addWard(\DataBundle\Entity\Ward $ward)
    {
        $this->ward[] = $ward;

        return $this;
    }

    /**
     * Remove ward
     *
     * @param \DataBundle\Entity\Ward $ward
     */
    public function removeWard(\DataBundle\Entity\Ward $ward)
    {
        $this->ward->removeElement($ward);
    }

    /**
     * Get ward
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWard()
    {
        return $this->ward;
    }

    /**
     * Set province
     *
     * @param \DataBundle\Entity\Province $province
     *
     * @return District
     */
    public function setProvince(\DataBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \DataBundle\Entity\Province
     */
    public function getProvince()
    {
        return $this->province;
    }
}
