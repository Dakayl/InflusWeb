<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PossesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('joueur', 'text',array("label"=>"Joueur / Interprête"))
	    ->add('email','text')
	    ->add('clan','hidden')
	    ->add('ville','text')
	    ->add('allies', 'integer', array('max_length'=>1))
	    ->add('renommee', 'integer', array('max_length'=>1))
            ->add('contacts', 'integer', array('max_length'=>1))
            ->add('ressources', 'integer', array('max_length'=>1))
	    ->add('banque','integer')
            ->add('servant', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des servants','type' => new ServantType(),'prototype'=>true,'by_reference' => false,'allow_add' => true,'allow_delete'=>true))
	    ->add('refuge', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des refuges','type' => new RefugeType(),'prototype'=>true,'by_reference' => false,'allow_add' => true,'allow_delete'=>true))
	    ->add('vehicule', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des véhicules','type' => new VehiculeType(),'prototype'=>true,'by_reference' => false,'allow_add' => true,'allow_delete'=>true))
            ->add('etiquette', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des compétences en étiquette','type' => new EtiquetteType(),'prototype'=>true,'by_reference' => false,'allow_add' => true,'allow_delete'=>true))
            ->add('influence', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des influences','type' => new InfluenceType(),'prototype'=>true,'by_reference' => false,'allow_add' => true,'allow_delete'=>true))
	    ->add('save', 'submit',array("label"=>"Sauvegarder"));
    }

    public function getName()
    {
        return 'Possesseur';
    }
}
