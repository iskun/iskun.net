<?php

namespace DataBundle\Entity;

/**
 * Configurations
 */
class Configurations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $converter_ip;


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
     * Set converterIp
     *
     * @param string $converterIp
     *
     * @return Configurations
     */
    public function setConverterIp($converterIp)
    {
        $this->converter_ip = $converterIp;

        return $this;
    }

    /**
     * Get converterIp
     *
     * @return string
     */
    public function getConverterIp()
    {
        return $this->converter_ip;
    }
}

