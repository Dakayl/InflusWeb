<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tour
 *
 * @ORM\Table(name="tour")
 * @ORM\Entity
 */
class Tour
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=255, nullable=false)
     */
    private $mois;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_limite", type="datetime", nullable=false)
     */
    private $dateLimite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_partie", type="datetime", nullable=false)
     */
    private $datePartie;

    /**
     * @var integer
     *
     * @ORM\Column(name="actions", type="smallint", nullable=false)
     */
    private $actions = '3';



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
     * Set mois
     *
     * @param string $mois
     * @return Tour
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return string 
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     * @return Tour
     */
    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime 
     */
    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    /**
     * Set datePartie
     *
     * @param \DateTime $datePartie
     * @return Tour
     */
    public function setDatePartie($datePartie)
    {
        $this->datePartie = $datePartie;

        return $this;
    }

    /**
     * Get datePartie
     *
     * @return \DateTime 
     */
    public function getDatePartie()
    {
        return $this->datePartie;
    }

    /**
     * Set actions
     *
     * @param integer $actions
     * @return Tour
     */
    public function setActions($actions)
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * Get actions
     *
     * @return integer 
     */
    public function getActions()
    {
        return $this->actions;
    }
}
