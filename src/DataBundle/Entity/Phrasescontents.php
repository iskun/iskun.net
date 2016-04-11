<?php

namespace DataBundle\Entity;

/**
 * Phrasescontents
 */
class Phrasescontents
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $language;

    /**
     * @var \DataBundle\Entity\Phrases
     */
    private $phrases;


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
     * Set content
     *
     * @param string $content
     *
     * @return Phrasescontents
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Phrasescontents
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set phrases
     *
     * @param \DataBundle\Entity\Phrases $phrases
     *
     * @return Phrasescontents
     */
    public function setPhrases(\DataBundle\Entity\Phrases $phrases = null)
    {
        $this->phrases = $phrases;

        return $this;
    }

    /**
     * Get phrases
     *
     * @return \DataBundle\Entity\Phrases
     */
    public function getPhrases()
    {
        return $this->phrases;
    }
}
