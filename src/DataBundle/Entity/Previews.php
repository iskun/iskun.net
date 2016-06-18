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
 * Previews
 */
class Previews
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
    private $file;

    /**
     * @var \DataBundle\Entity\Files
     */
    private $files;


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
     * Set file
     *
     * @param string $file
     *
     * @return Previews
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set files
     *
     * @param \DataBundle\Entity\Files $files
     *
     * @return Previews
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
    /**
     * @var string
     * @Groups({"basic"}) 
     */
    private $filepath;


    /**
     * Set filepath
     *
     * @param string $filepath
     *
     * @return Previews
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }

    /**
     * Get filepath
     *
     * @return string
     */
    public function getFilepath()
    {
        return $this->filepath;
    }
    /**
     * @var integer
     */
    private $page;


    /**
     * Set page
     *
     * @param integer $page
     *
     * @return Previews
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return integer
     */
    public function getPage()
    {
        return $this->page;
    }
}
