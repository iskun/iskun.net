<?php

namespace DataBundle\Entity;

/**
 * SchoolsTypesGrades
 */
class SchoolsTypesGrades
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DataBundle\Entity\Grades
     */
    private $grades;

    /**
     * @var \DataBundle\Entity\SchoolsTypes
     */
    private $schoolstypes;


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
     * Set grades
     *
     * @param \DataBundle\Entity\Grades $grades
     *
     * @return SchoolsTypesGrades
     */
    public function setGrades(\DataBundle\Entity\Grades $grades = null)
    {
        $this->grades = $grades;

        return $this;
    }

    /**
     * Get grades
     *
     * @return \DataBundle\Entity\Grades
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * Set schoolstypes
     *
     * @param \DataBundle\Entity\SchoolsTypes $schoolstypes
     *
     * @return SchoolsTypesGrades
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
}
