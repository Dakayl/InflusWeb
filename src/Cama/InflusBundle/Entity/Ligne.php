<?php

namespace Cama\InflusBundle\Entity;

/**
 * Ligne
 *
 */
class Ligne
{
    /**
     * @var integer
     *
     */
    private $value;

    
    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param value $value
     * @return Ligne
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
