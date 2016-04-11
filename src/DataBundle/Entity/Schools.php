<?php

namespace DataBundle\Entity;

/**
 * Schools
 */
class Schools
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
     * @var integer
     */
    private $create_time;

    /**
     * @var string
     */
    private $strip;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $address = '';

    /**
     * @var string
     */
    private $mobile = '';

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolsfaculties;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolsyears;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $schoolsteachers;

    /**
     * @var \DataBundle\Entity\Locations
     */
    private $locations;

    /**
     * @var \DataBundle\Entity\Locations
     */
    private $schoolsprovinces;

    /**
     * @var \DataBundle\Entity\SchoolsTypes
     */
    private $schoolstypes;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $schoolscreater;

    /**
     * @var \DataBundle\Entity\Users
     */
    private $schoolsadministrators;

    /**
     * @var \DataBundle\Entity\Slugs
     */
    private $slugs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolsfaculties = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolsyears = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schoolsteachers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Schools
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
     * Set createTime
     *
     * @param integer $createTime
     *
     * @return Schools
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return integer
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set strip
     *
     * @param string $strip
     *
     * @return Schools
     */
    public function setStrip($strip)
    {
        $this->strip = $strip;

        return $this;
    }

    /**
     * Get strip
     *
     * @return string
     */
    public function getStrip()
    {
        return $this->strip;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Schools
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Schools
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Schools
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Schools
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Schools
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Schools
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Add class
     *
     * @param \DataBundle\Entity\Classes $class
     *
     * @return Schools
     */
    public function addClass(\DataBundle\Entity\Classes $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \DataBundle\Entity\Classes $class
     */
    public function removeClass(\DataBundle\Entity\Classes $class)
    {
        $this->classes->removeElement($class);
    }

    /**
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Add schoolsfaculty
     *
     * @param \DataBundle\Entity\Faculties $schoolsfaculty
     *
     * @return Schools
     */
    public function addSchoolsfaculty(\DataBundle\Entity\Faculties $schoolsfaculty)
    {
        $this->schoolsfaculties[] = $schoolsfaculty;

        return $this;
    }

    /**
     * Remove schoolsfaculty
     *
     * @param \DataBundle\Entity\Faculties $schoolsfaculty
     */
    public function removeSchoolsfaculty(\DataBundle\Entity\Faculties $schoolsfaculty)
    {
        $this->schoolsfaculties->removeElement($schoolsfaculty);
    }

    /**
     * Get schoolsfaculties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolsfaculties()
    {
        return $this->schoolsfaculties;
    }

    /**
     * Add schoolsyear
     *
     * @param \DataBundle\Entity\SchoolsYears $schoolsyear
     *
     * @return Schools
     */
    public function addSchoolsyear(\DataBundle\Entity\SchoolsYears $schoolsyear)
    {
        $this->schoolsyears[] = $schoolsyear;

        return $this;
    }

    /**
     * Remove schoolsyear
     *
     * @param \DataBundle\Entity\SchoolsYears $schoolsyear
     */
    public function removeSchoolsyear(\DataBundle\Entity\SchoolsYears $schoolsyear)
    {
        $this->schoolsyears->removeElement($schoolsyear);
    }

    /**
     * Get schoolsyears
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolsyears()
    {
        return $this->schoolsyears;
    }

    /**
     * Add schoolsteacher
     *
     * @param \DataBundle\Entity\SchoolsTeachers $schoolsteacher
     *
     * @return Schools
     */
    public function addSchoolsteacher(\DataBundle\Entity\SchoolsTeachers $schoolsteacher)
    {
        $this->schoolsteachers[] = $schoolsteacher;

        return $this;
    }

    /**
     * Remove schoolsteacher
     *
     * @param \DataBundle\Entity\SchoolsTeachers $schoolsteacher
     */
    public function removeSchoolsteacher(\DataBundle\Entity\SchoolsTeachers $schoolsteacher)
    {
        $this->schoolsteachers->removeElement($schoolsteacher);
    }

    /**
     * Get schoolsteachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolsteachers()
    {
        return $this->schoolsteachers;
    }

    /**
     * Set locations
     *
     * @param \DataBundle\Entity\Locations $locations
     *
     * @return Schools
     */
    public function setLocations(\DataBundle\Entity\Locations $locations = null)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Get locations
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Set schoolsprovinces
     *
     * @param \DataBundle\Entity\Locations $schoolsprovinces
     *
     * @return Schools
     */
    public function setSchoolsprovinces(\DataBundle\Entity\Locations $schoolsprovinces = null)
    {
        $this->schoolsprovinces = $schoolsprovinces;

        return $this;
    }

    /**
     * Get schoolsprovinces
     *
     * @return \DataBundle\Entity\Locations
     */
    public function getSchoolsprovinces()
    {
        return $this->schoolsprovinces;
    }

    /**
     * Set schoolstypes
     *
     * @param \DataBundle\Entity\SchoolsTypes $schoolstypes
     *
     * @return Schools
     */
    public function setSchoolstypes(\DataBundle\Entity\SchoolsTypes $schoolstypes = null)
    {
        $this->schoolstypes = $schoolstypes;

        return $this;
    }

    /**
     * Get schoolstypes
     *
     * @return \DataBundle\Entity\SchoolsTypes
     */
    public function getSchoolstypes()
    {
        return $this->schoolstypes;
    }

    /**
     * Set schoolscreater
     *
     * @param \DataBundle\Entity\Users $schoolscreater
     *
     * @return Schools
     */
    public function setSchoolscreater(\DataBundle\Entity\Users $schoolscreater = null)
    {
        $this->schoolscreater = $schoolscreater;

        return $this;
    }

    /**
     * Get schoolscreater
     *
     * @return \DataBundle\Entity\Users
     */
    public function getSchoolscreater()
    {
        return $this->schoolscreater;
    }

    /**
     * Set schoolsadministrators
     *
     * @param \DataBundle\Entity\Users $schoolsadministrators
     *
     * @return Schools
     */
    public function setSchoolsadministrators(\DataBundle\Entity\Users $schoolsadministrators = null)
    {
        $this->schoolsadministrators = $schoolsadministrators;

        return $this;
    }

    /**
     * Get schoolsadministrators
     *
     * @return \DataBundle\Entity\Users
     */
    public function getSchoolsadministrators()
    {
        return $this->schoolsadministrators;
    }

    /**
     * Set slugs
     *
     * @param \DataBundle\Entity\Slugs $slugs
     *
     * @return Schools
     */
    public function setSlugs(\DataBundle\Entity\Slugs $slugs = null)
    {
        $this->slugs = $slugs;

        return $this;
    }

    /**
     * Get slugs
     *
     * @return \DataBundle\Entity\Slugs
     */
    public function getSlugs()
    {
        return $this->slugs;
    }
}
