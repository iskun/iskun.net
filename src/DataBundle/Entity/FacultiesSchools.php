<?php

namespace DataBundle\Entity;

/**
 * FacultiesSchools
 */
class FacultiesSchools
{
    /**
     * @var integer
     */
    private $fs_id;

    /**
     * @var integer
     */
    private $fs_status;

    /**
     * @var \DataBundle\Entity\Faculties
     */
    private $faculties;

    /**
     * @var \DataBundle\Entity\Schools
     */
    private $schools;


    /**
     * Get fsId
     *
     * @return integer
     */
    public function getFsId()
    {
        return $this->fs_id;
    }

    /**
     * Set fsStatus
     *
     * @param integer $fsStatus
     *
     * @return FacultiesSchools
     */
    public function setFsStatus($fsStatus)
    {
        $this->fs_status = $fsStatus;

        return $this;
    }

    /**
     * Get fsStatus
     *
     * @return integer
     */
    public function getFsStatus()
    {
        return $this->fs_status;
    }

    /**
     * Set faculties
     *
     * @param \DataBundle\Entity\Faculties $faculties
     *
     * @return FacultiesSchools
     */
    public function setFaculties(\DataBundle\Entity\Faculties $faculties = null)
    {
        $this->faculties = $faculties;

        return $this;
    }

    /**
     * Get faculties
     *
     * @return \DataBundle\Entity\Faculties
     */
    public function getFaculties()
    {
        return $this->faculties;
    }

    /**
     * Set schools
     *
     * @param \DataBundle\Entity\Schools $schools
     *
     * @return FacultiesSchools
     */
    public function setSchools(\DataBundle\Entity\Schools $schools = null)
    {
        $this->schools = $schools;

        return $this;
    }

    /**
     * Get schools
     *
     * @return \DataBundle\Entity\Schools
     */
    public function getSchools()
    {
        return $this->schools;
    }
}
