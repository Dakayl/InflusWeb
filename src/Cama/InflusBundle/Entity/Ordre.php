<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordre
 *
 * @ORM\Table(name="ordre", indexes={@ORM\Index(name="tour", columns={"tour"}), @ORM\Index(name="influence", columns={"influence"})})
 * @ORM\Entity
 */
class Ordre
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
     * @var boolean
     *
     * @ORM\Column(name="validate", type="boolean", nullable=true)
     */
    private $validate;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveau", type="smallint", nullable=false)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat_texte", type="text", nullable=false)
     */
    private $resultatTexte;

    /**
     * @var \Tour
     *
     * @ORM\ManyToOne(targetEntity="Tour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tour", referencedColumnName="id")
     * })
     */
    private $tour;

    /**
     * @var \Influence
     *
     * @ORM\ManyToOne(targetEntity="Influence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="influence", referencedColumnName="id")
     * })
     */
    private $influence;



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
     * Set validate
     *
     * @param boolean $validate
     * @return Ordre
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return boolean 
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Ordre
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
     * Set niveau
     *
     * @param integer $niveau
     * @return Ordre
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return integer 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Ordre
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
     * Set resultatTexte
     *
     * @param string $resultatTexte
     * @return Ordre
     */
    public function setResultatTexte($resultatTexte)
    {
        $this->resultatTexte = $resultatTexte;

        return $this;
    }

    /**
     * Get resultatTexte
     *
     * @return string 
     */
    public function getResultatTexte()
    {
        return $this->resultatTexte;
    }

    /**
     * Set tour
     *
     * @param \Cama\InflusBundle\Entity\Tour $tour
     * @return Ordre
     */
    public function setTour(\Cama\InflusBundle\Entity\Tour $tour = null)
    {
        $this->tour = $tour;

        return $this;
    }

    /**
     * Get tour
     *
     * @return \Cama\InflusBundle\Entity\Tour 
     */
    public function getTour()
    {
        return $this->tour;
    }

    /**
     * Set influence
     *
     * @param \Cama\InflusBundle\Entity\Influence $influence
     * @return Ordre
     */
    public function setInfluence(\Cama\InflusBundle\Entity\Influence $influence = null)
    {
        $this->influence = $influence;

        return $this;
    }

    /**
     * Get influence
     *
     * @return \Cama\InflusBundle\Entity\Influence 
     */
    public function getInfluence()
    {
        return $this->influence;
    }
}
