<?php

namespace DataBundle\Entity;

/**
 * Resourcesfiles
 */
class Resourcesfiles
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
    private $description;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $folder;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var integer
     */
    private $page;

    /**
     * @var string
     */
    private $thumb;

    /**
     * @var integer
     */
    private $thumbpage;

    /**
     * @var integer
     */
    private $thumbtry;

    /**
     * @var integer
     */
    private $size;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \DataBundle\Entity\Resources
     */
    private $resources;


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
     * @return Resourcesfiles
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
     * Set description
     *
     * @param string $description
     *
     * @return Resourcesfiles
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Resourcesfiles
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
     * Set folder
     *
     * @param string $folder
     *
     * @return Resourcesfiles
     */
    public function setFolder($folder)
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * Get folder
     *
     * @return string
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Resourcesfiles
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
     * Set hash
     *
     * @param string $hash
     *
     * @return Resourcesfiles
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
     * Set page
     *
     * @param integer $page
     *
     * @return Resourcesfiles
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

    /**
     * Set thumb
     *
     * @param string $thumb
     *
     * @return Resourcesfiles
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * Get thumb
     *
     * @return string
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * Set thumbpage
     *
     * @param integer $thumbpage
     *
     * @return Resourcesfiles
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
     * Set thumbtry
     *
     * @param integer $thumbtry
     *
     * @return Resourcesfiles
     */
    public function setThumbtry($thumbtry)
    {
        $this->thumbtry = $thumbtry;

        return $this;
    }

    /**
     * Get thumbtry
     *
     * @return integer
     */
    public function getThumbtry()
    {
        return $this->thumbtry;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Resourcesfiles
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Resourcesfiles
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
     * Set resources
     *
     * @param \DataBundle\Entity\Resources $resources
     *
     * @return Resourcesfiles
     */
    public function setResources(\DataBundle\Entity\Resources $resources = null)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Get resources
     *
     * @return \DataBundle\Entity\Resources
     */
    public function getResources()
    {
        return $this->resources;
    }
}
