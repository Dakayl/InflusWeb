<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PossesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('joueur', 'text')
	    ->add('email','text')
	    ->add('clan','hidden')
	    ->add('ville','text')
	    ->add('allies', 'integer', array('max_length'=>1))
	    ->add('renommee', 'integer', array('max_length'=>1))
            ->add('contacts', 'integer', array('max_length'=>1))
            ->add('ressources', 'integer', array('max_length'=>1))
	    ->add('banque','integer')
            ->add('servant', 'collection', array("label"=>'Liste de mes servants','type' => new ServantType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
	    ->add('refuge', 'collection', array("label"=>'Liste de mes refuges','type' => new RefugeType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
	    ->add('vehicule', 'collection', array("label"=>'Liste de mes véhicules','type' => new VehiculeType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
            ->add('etiquette', 'collection', array("label"=>'Liste de mes compétences en étiquette','type' => new EtiquetteType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
            ->add('influence', 'collection', array("label"=>'Liste de mes influences','type' => new InfluenceType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
	    ->add('save', 'submit');
    }

    public function getName()
    {
        return 'Possesseur';
    }
}
