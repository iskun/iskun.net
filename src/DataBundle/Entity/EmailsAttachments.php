<?php

namespace DataBundle\Entity;
use JMS\Serializer\Annotation\AccessType;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\MaxDepth;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
/**
 * EmailsAttachments
 */
class EmailsAttachments
{
    /**
     * @var integer
     * @Groups({"basic"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"basic"})
     */
    private $file_path;

    /**
     * @var \DataBundle\Entity\Emails
     */
    private $emails;


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
     * Set filePath
     *
     * @param string $filePath
     *
     * @return EmailsAttachments
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * Set emails
     *
     * @param \DataBundle\Entity\Emails $emails
     *
     * @return EmailsAttachments
     */
    public function setEmails(\DataBundle\Entity\Emails $emails = null)
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * Get emails
     *
     * @return \DataBundle\Entity\Emails
     */
    public function getEmails()
    {
        return $this->emails;
    }
    /**
     * @var string
     * @Groups({"basic"})
     */
    private $file_format;


    /**
     * Set fileFormat
     *
     * @param string $fileFormat
     *
     * @return EmailsAttachments
     */
    public function setFileFormat($fileFormat)
    {
        $this->file_format = $fileFormat;

        return $this;
    }

    /**
     * Get fileFormat
     *
     * @return string
     */
    public function getFileFormat()
    {
        return $this->file_format;
    }
    /**
     * @var string
     * @Groups({"basic"})
     */
    private $file_name;


    /**
     * Set fileName
     *
     * @param string $fileName
     *
     * @return EmailsAttachments
     */
    public function setFileName($fileName)
    {
        $this->file_name = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->file_name;
    }
    /**
     * @var string
     */
    private $thumbnail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $previews;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->previews = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return EmailsAttachments
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Add preview
     *
     * @param \DataBundle\Entity\Previews $preview
     *
     * @return EmailsAttachments
     */
    public function addPreview(\DataBundle\Entity\Previews $preview)
    {
        $this->previews[] = $preview;

        return $this;
    }

    /**
     * Remove preview
     *
     * @param \DataBundle\Entity\Previews $preview
     */
    public function removePreview(\DataBundle\Entity\Previews $preview)
    {
        $this->previews->removeElement($preview);
    }

    /**
     * Get previews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPreviews()
    {
        return $this->previews;
    }
    /**
     * @var \DataBundle\Entity\Files
     * @Groups({"basic"})
     */
    private $files;


    /**
     * Set files
     *
     * @param \DataBundle\Entity\Files $files
     *
     * @return EmailsAttachments
     */
    public function setFiles(\DataBundle\Entity\Files $files = null)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * Get files
     *
     * @return \DataBundle\Entity\Files
     */
    public function getFiles()
    {
        return $this->files;
    }
}
