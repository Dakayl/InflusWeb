<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Refuge
 *
 * @ORM\Table(name="refuge", indexes={@ORM\Index(name="possesseur", columns={"possesseur"})})
 * @ORM\Entity
 */
class Refuge
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
     * @var integer
     *
     * @ORM\Column(name="niveau", type="smallint", nullable=false)
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
     * @var integer
     *
     * @ORM\Column(name="securite", type="smallint", nullable=false)
     */
    private $securite;

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
     * Set niveau
     *
     * @param integer $niveau
     * @return Refuge
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
     * Set nom
     *
     * @param string $nom
     * @return Refuge
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
     * @return Refuge
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
     * Set securite
     *
     * @param integer $securite
     * @return Refuge
     */
    public function setSecurite($securite)
    {
        $this->securite = $securite;

        return $this;
    }

    /**
     * Get securite
     *
     * @return integer 
     */
    public function getSecurite()
    {
        return $this->securite;
    }

    /**
     * Set possesseur
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseur
     * @return Refuge
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
