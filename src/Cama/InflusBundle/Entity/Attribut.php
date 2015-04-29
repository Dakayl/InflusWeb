<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribut
 *
 * @ORM\Table(name="attribut", indexes={@ORM\Index(name="possesseur", columns={"possesseurId"}), @ORM\Index(name="tour", columns={"tourId"})})
 * @ORM\Entity
 */
class Attribut
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
     * @ORM\Column(name="attribut", type="string", length=255, nullable=false)
     */
    private $attribut;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validate", type="boolean", nullable=true)
     */
    private $validate;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat_text", type="text", nullable=false)
     */
    private $resultatText;

    /**
     * @var \Possesseur
     *
     * @ORM\ManyToOne(targetEntity="Possesseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="possesseurId", referencedColumnName="id")
     * })
     */
    private $possesseurid;

    /**
     * @var \Tour
     *
     * @ORM\ManyToOne(targetEntity="Tour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tourId", referencedColumnName="id")
     * })
     */
    private $tourid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Possesseur", inversedBy="tour")
     * @ORM\JoinTable(name="tour_possesseur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tour", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="possesseur", referencedColumnName="id")
     *   }
     * )
     */
    private $possesseur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->possesseur = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set attribut
     *
     * @param string $attribut
     * @return Attribut
     */
    public function setAttribut($attribut)
    {
        $this->attribut = $attribut;

        return $this;
    }

    /**
     * Get attribut
     *
     * @return string 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Action
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
     * Set validate
     *
     * @param boolean $validate
     * @return Action
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
     * Set resultatText
     *
     * @param string $resultatText
     * @return Action
     */
    public function setResultatText($resultatText)
    {
        $this->resultatText = $resultatText;

        return $this;
    }

    /**
     * Get resultatText
     *
     * @return string 
     */
    public function getResultatText()
    {
        return $this->resultatText;
    }

    /**
     * Set possesseurid
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseurid
     * @return Action
     */
    public function setPossesseurid(\Cama\InflusBundle\Entity\Possesseur $possesseurid = null)
    {
        $this->possesseurid = $possesseurid;

        return $this;
    }

    /**
     * Get possesseurid
     *
     * @return \Cama\InflusBundle\Entity\Possesseur 
     */
    public function getPossesseurid()
    {
        return $this->possesseurid;
    }

    /**
     * Set tourid
     *
     * @param \Cama\InflusBundle\Entity\Tour $tourid
     * @return Action
     */
    public function setTourid(\Cama\InflusBundle\Entity\Tour $tourid = null)
    {
        $this->tourid = $tourid;

        return $this;
    }

    /**
     * Get tourid
     *
     * @return \Cama\InflusBundle\Entity\Tour 
     */
    public function getTourid()
    {
        return $this->tourid;
    }

    /**
     * Add possesseur
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseur
     * @return Action
     */
    public function addPossesseur(\Cama\InflusBundle\Entity\Possesseur $possesseur)
    {
        $this->possesseur[] = $possesseur;

        return $this;
    }

    /**
     * Remove possesseur
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseur
     */
    public function removePossesseur(\Cama\InflusBundle\Entity\Possesseur $possesseur)
    {
        $this->possesseur->removeElement($possesseur);
    }

    /**
     * Get possesseur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPossesseur()
    {
        return $this->possesseur;
    }
}
