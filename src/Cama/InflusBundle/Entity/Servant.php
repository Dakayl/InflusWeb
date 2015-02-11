<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servant
 *
 * @ORM\Table(name="servant", indexes={@ORM\Index(name="possesseur", columns={"possesseur"})})
 * @ORM\Entity
 */
class Servant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="niveau", type="boolean", nullable=false)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var \Possesseur
     *
     * @ORM\ManyToOne(targetEntity="Possesseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="possesseur", referencedColumnName="id")
     * })
     */
    private $possesseur;



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
     * Set type
     *
     * @param string $type
     * @return Servant
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
     * @param boolean $niveau
     * @return Servant
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return boolean 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Servant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Servant
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
     * Set possesseur
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseur
     * @return Servant
     */
    public function setPossesseur(\Cama\InflusBundle\Entity\Possesseur $possesseur = null)
    {
        $this->possesseur = $possesseur;

        return $this;
    }

    /**
     * Get possesseur
     *
     * @return \Cama\InflusBundle\Entity\Possesseur 
     */
    public function getPossesseur()
    {
        return $this->possesseur;
    }
}
