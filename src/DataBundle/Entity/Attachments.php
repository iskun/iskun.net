<?php

namespace DataBundle\Entity;

/**
 * Attachments
 */
class Attachments
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $format;

    /**
     * @var integer
     */
    private $thumbpage;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attachmentstargets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attachmentstargets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set filename
     *
     * @param string $filename
     *
     * @return Attachments
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Attachments
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set thumbpage
     *
     * @param integer $thumbpage
     *
     * @return Attachments
     */
    public function setThumbpage($thumbpage)
    {
        $this->thumbpage = $thumbpage;

        return $this;
    }

    /**
     * Get thumbpage
     *
     * @return integer
     */
    public function getThumbpage()
    {
        return $this->thumbpage;
    }

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return Attachments
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Add attachmentstarget
     *
     * @param \DataBundle\Entity\Attachmentstargets $attachmentstarget
     *
     * @return Attachments
     */
    public function addAttachmentstarget(\DataBundle\Entity\Attachmentstargets $attachmentstarget)
    {
        $this->attachmentstargets[] = $attachmentstarget;

        return $this;
    }

    /**
     * Remove attachmentstarget
     *
     * @param \DataBundle\Entity\Attachmentstargets $attachmentstarget
     */
    public function removeAttachmentstarget(\DataBundle\Entity\Attachmentstargets $attachmentstarget)
    {
        $this->attachmentstargets->removeElement($attachmentstarget);
    }

    /**
     * Get attachmentstargets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttachmentstargets()
    {
        return $this->attachmentstargets;
    }
}
