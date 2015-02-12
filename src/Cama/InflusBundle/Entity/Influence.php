<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cama\InflusBundle\Constants;
/**
 * Influence
 *
 * @ORM\Table(name="influence", indexes={@ORM\Index(name="possesseur", columns={"possesseur"})})
 * @ORM\Entity
 */
class Influence
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
     * @var integer
     *
     * @ORM\Column(name="XP", type="smallint", nullable=false)
     */
    private $xp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

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
     * @return Influence
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
     * Get textType
     *
     * @return string 
     */
    public function getTextType()
    {
        return Constants::$TYPE_INFLUENCE[$this->type];
    }
    /**
     * Set niveau
     *
     * @param integer $niveau
     * @return Influence
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
     * Set xp
     *
     * @param integer $xp
     * @return Influence
     */
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get xp
     *
     * @return integer 
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Influence
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Influence
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
     * Set possesseur
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseur
     * @return Influence
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
