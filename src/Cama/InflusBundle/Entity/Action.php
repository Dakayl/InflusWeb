<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action", indexes={@ORM\Index(name="possesseur", columns={"possesseurId"}), @ORM\Index(name="tour", columns={"tourId"})})
 * @ORM\Entity
 */
class Action
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
     * @var string
     *
     * @ORM\Column(name="parametres", type="text", length=65535, nullable=false)
     */
    private $parametres;

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
     * Set type
     *
     * @param string $type
     * @return Action
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
     * Set parametres
     *
     * @param string $parametres
     * @return Action
     */
    public function setParametres($parametres)
    {
        $this->parametres = $parametres;

        return $this;
    }

    /**
     * Get parametres
     *
     * @return string 
     */
    public function getParametres()
    {
        return $this->parametres;
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
