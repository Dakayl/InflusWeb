<?php

namespace Cama\InflusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Possesseur
 *
 * @ORM\Table(name="possesseur", indexes={@ORM\Index(name="id_phpbb", columns={"id_phpbb"})})
 * @ORM\Entity
 */
class Possesseur
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="clan", type="string", length=255, nullable=false)
     */
    private $clan;

    /**
     * @var string
     *
     * @ORM\Column(name="joueur", type="string", length=255, nullable=false)
     */
    private $joueur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_phpbb", type="bigint", nullable=true)
     */
    private $idPhpbb;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inactif", type="boolean", nullable=false)
     */
    private $inactif = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="allies", type="smallint", nullable=false)
     */
    private $allies = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ressources", type="smallint", nullable=false)
     */
    private $ressources = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="renommee", type="smallint", nullable=false)
     */
    private $renommee = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="contacts", type="smallint", nullable=false)
     */
    private $contacts = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="banque", type="bigint", nullable=false)
     */
    private $banque = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Influence", mappedBy="possesseur", cascade={"persist"})
     */
    private $influence;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Refuge", mappedBy="possesseur", cascade={"persist"})
     */
    private $refuge;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Vehicule", mappedBy="possesseur", cascade={"persist"})
     */
    private $vehicule;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Etiquette", mappedBy="possesseur", cascade={"persist"})
     */
    private $etiquette;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Servant", mappedBy="possesseur", cascade={"persist"})
     */
    private $servant;

    //TBDONE
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Possesseur")
     */
     
    private $possesseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Action", mappedBy="possesseur")
     */
    private $tour;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->possesseur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tour = new \Doctrine\Common\Collections\ArrayCollection();
	$this->refuge = new \Doctrine\Common\Collections\ArrayCollection();
	$this->vehicule = new \Doctrine\Common\Collections\ArrayCollection();
	$this->servant = new \Doctrine\Common\Collections\ArrayCollection();
	$this->etiquette = new \Doctrine\Common\Collections\ArrayCollection();
	$this->influence  = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set nom
     *
     * @param string $nom
     * @return Possesseur
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
     * Set email
     *
     * @param string $email
     * @return Possesseur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set clan
     *
     * @param string $clan
     * @return Possesseur
     */
    public function setClan($clan)
    {
        $this->clan = $clan;

        return $this;
    }

    /**
     * Get clan
     *
     * @return string 
     */
    public function getClan()
    {
        return $this->clan;
    }

    /**
     * Set joueur
     *
     * @param string $joueur
     * @return Possesseur
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return string 
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set idPhpbb
     *
     * @param integer $idPhpbb
     * @return Possesseur
     */
    public function setIdPhpbb($idPhpbb)
    {
        $this->idPhpbb = $idPhpbb;

        return $this;
    }

    /**
     * Get idPhpbb
     *
     * @return integer 
     */
    public function getIdPhpbb()
    {
        return $this->idPhpbb;
    }

    /**
     * Set inactif
     *
     * @param boolean $inactif
     * @return Possesseur
     */
    public function setInactif($inactif)
    {
        $this->inactif = $inactif;

        return $this;
    }

    /**
     * Get inactif
     *
     * @return boolean 
     */
    public function getInactif()
    {
        return $this->inactif;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Possesseur
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
     * Set allies
     *
     * @param integer $allies
     * @return Possesseur
     */
    public function setAllies($allies)
    {
        $this->allies = $allies;

        return $this;
    }

    /**
     * Get allies
     *
     * @return integer 
     */
    public function getAllies()
    {
        return $this->allies;
    }

    /**
     * Set renommee
     *
     * @param integer $renommee
     * @return Possesseur
     */
    public function setRenommee($renommee)
    {
        $this->renommee = $renommee;

        return $this;
    }

    /**
     * Get renommee
     *
     * @return integer 
     */
    public function getRenommee()
    {
        return $this->renommee;
    }

    /**
     * Set ressources
     *
     * @param integer $ressources
     * @return Possesseur
     */
    public function setRessources($ressources)
    {
        $this->ressources = $ressources;

        return $this;
    }

    /**
     * Get ressources
     *
     * @return integer 
     */
    public function getRessources()
    {
        return $this->ressources;
    }

    /**
     * Set contacts
     *
     * @param integer $contacts
     * @return Possesseur
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * Get contacts
     *
     * @return integer 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set banque
     *
     * @param integer $banque
     * @return Possesseur
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return integer 
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Add possesseur
     *
     * @param \Cama\InflusBundle\Entity\Possesseur $possesseur
     * @return Possesseur
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

    /**
     * Add tour
     *
     * @param \Cama\InflusBundle\Entity\Action $tour
     * @return Possesseur
     */
    public function addTour(\Cama\InflusBundle\Entity\Action $tour)
    {
        $this->tour[] = $tour;

        return $this;
    }

    /**
     * Remove tour
     *
     * @param \Cama\InflusBundle\Entity\Action $tour
     */
    public function removeTour(\Cama\InflusBundle\Entity\Action $tour)
    {
        $this->tour->removeElement($tour);
    }

    /**
     * Get tour
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTour()
    {
        return $this->tour;
    }

    /**
     * Add influence
     *
     * @param \Cama\InflusBundle\Entity\Influence $influence
     * @return Possesseur
     */
    public function addInfluence(\Cama\InflusBundle\Entity\Influence $influence)
    {
        $influence->setPossesseur($this);
	$this->influence[] = $influence;

        return $this;
    }

    /**
     * Remove influence
     *
     * @param \Cama\InflusBundle\Entity\Influence $influence
     */
    public function removeInfluence(\Cama\InflusBundle\Entity\Influence $influence)
    {
         $influence->setPossesseur();
	 $this->influence->removeElement($influence);
    }

    /**
     * Get influence
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInfluence()
    {
        return $this->influence;
    }

    /**
     * Add etiquette
     *
     * @param \Cama\InflusBundle\Entity\Etiquette $etiquette
     * @return Possesseur
     */
    public function addEtiquette(\Cama\InflusBundle\Entity\Etiquette $etiquette)
    {
        $etiquette->setPossesseur($this);
	$this->etiquette[] = $etiquette;

        return $this;
    }

    /**
     * Remove etiquette
     *
     * @param \Cama\InflusBundle\Entity\Etiquette $etiquette
     */
    public function removeEtiquette(\Cama\InflusBundle\Entity\Etiquette $etiquette)
    {
        $etiquette->setPossesseur();
	$this->etiquette->removeElement($etiquette);
    }

    /**
     * Get etiquette
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtiquette()
    {
        return $this->etiquette;
    }

    /**
     * Add servant
     *
     * @param \Cama\InflusBundle\Entity\Servant $servant
     * @return Possesseur
     */
    public function addServant(\Cama\InflusBundle\Entity\Servant $servant)
    {
	$servant->setPossesseur($this);
        $this->servant[] = $servant;

        return $this;
    }

    /**
     * Remove servant
     *
     * @param \Cama\InflusBundle\Entity\Servant $servant
     */
    public function removeServant(\Cama\InflusBundle\Entity\Servant $servant)
    {
	$servant->setPossesseur();
        $this->servant->removeElement($servant);
    }

    /**
     * Get servant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServant()
    {
        return $this->servant;
    }

    /**
     * Add refuge
     *
     * @param \Cama\InflusBundle\Entity\Refuge $refuge
     * @return Possesseur
     */
    public function addRefuge(\Cama\InflusBundle\Entity\Refuge $refuge)
    {
        $refuge->setPossesseur($this);
	$this->refuge[] = $refuge;

        return $this;
    }

    /**
     * Remove refuge
     *
     * @param \Cama\InflusBundle\Entity\Refuge $refuge
     */
    public function removeRefuge(\Cama\InflusBundle\Entity\Refuge $refuge)
    {
        $refuge->setPossesseur();
	$this->refuge->removeElement($refuge);
    }

    /**
     * Get refuge
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRefuge()
    {
        return $this->refuge;
    }

    /**
     * Add vehicule
     *
     * @param \Cama\InflusBundle\Entity\Vehicule $vehicule
     * @return Possesseur
     */
    public function addVehicule(\Cama\InflusBundle\Entity\Vehicule $vehicule)
    {
        $vehicule->setPossesseur($this);
	$this->vehicule[] = $vehicule;

        return $this;
    }

    /**
     * Remove vehicule
     *
     * @param \Cama\InflusBundle\Entity\Vehicule $vehicule
     */
    public function removeVehicule(\Cama\InflusBundle\Entity\Vehicule $vehicule)
    {
        $vehicule->setPossesseur();
	$this->vehicule->removeElement($vehicule);
    }

    /**
     * Get vehicule
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

}
