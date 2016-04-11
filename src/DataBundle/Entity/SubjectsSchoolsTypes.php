<?php

namespace DataBundle\Entity;

/**
 * SubjectsSchoolsTypes
 */
class SubjectsSchoolsTypes
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $generator;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DataBundle\Entity\Subjects
     */
    private $subjects;

    /**
     * @var \DataBundle\Entity\SchoolsTypes
     */
    private $schoolstypes;


    /**
     * Set type
     *
     * @param string $type
     *
     * @return SubjectsSchoolsTypes
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
     * Set generator
     *
     * @param string $generator
     *
     * @return SubjectsSchoolsTypes
     */
    public function setGenerator($generator)
    {
        $this->generator = $generator;

        return $this;
    }

    /**
     * Get generator
     *
     * @return string
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return SubjectsSchoolsTypes
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set subjects
     *
     * @param \DataBundle\Entity\Subjects $subjects
     *
     * @return SubjectsSchoolsTypes
     */
    public function setSubjects(\DataBundle\Entity\Subjects $subjects = null)
    {
        $this->subjects = $subjects;

        return $this;
    }

    /**
     * Get subjects
     *
     * @return \DataBundle\Entity\Subjects
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Set schoolstypes
     *
     * @param \DataBundle\Entity\SchoolsTypes $schoolstypes
     *
     * @return SubjectsSchoolsTypes
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
