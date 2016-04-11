<?php

namespace DataBundle\Entity;

/**
 * Phrases
 */
class Phrases
{
    /**
     * @var integer
     */
    private $ph_id;

    /**
     * @var string
     */
    private $ph_name;

    /**
     * @var string
     */
    private $ph_type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $phrasescontents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phrasescontents = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get phId
     *
     * @return integer
     */
    public function getPhId()
    {
        return $this->ph_id;
    }

    /**
     * Set phName
     *
     * @param string $phName
     *
     * @return Phrases
     */
    public function setPhName($phName)
    {
        $this->ph_name = $phName;

        return $this;
    }

    /**
     * Get phName
     *
     * @return string
     */
    public function getPhName()
    {
        return $this->ph_name;
    }

    /**
     * Set phType
     *
     * @param string $phType
     *
     * @return Phrases
     */
    public function setPhType($phType)
    {
        $this->ph_type = $phType;

        return $this;
    }

    /**
     * Get phType
     *
     * @return string
     */
    public function getPhType()
    {
        return $this->ph_type;
    }

    /**
     * Add phrasescontent
     *
     * @param \DataBundle\Entity\Phrasescontents $phrasescontent
     *
     * @return Phrases
     */
    public function addPhrasescontent(\DataBundle\Entity\Phrasescontents $phrasescontent)
    {
        $this->phrasescontents[] = $phrasescontent;

        return $this;
    }

    /**
     * Remove phrasescontent
     *
     * @param \DataBundle\Entity\Phrasescontents $phrasescontent
     */
    public function removePhrasescontent(\DataBundle\Entity\Phrasescontents $phrasescontent)
    {
        $this->phrasescontents->removeElement($phrasescontent);
    }

    /**
     * Get phrasescontents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhrasescontents()
    {
        return $this->phrasescontents;
    }
}
