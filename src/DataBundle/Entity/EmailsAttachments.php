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
}
