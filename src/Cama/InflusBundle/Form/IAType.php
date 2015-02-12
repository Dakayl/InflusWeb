<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class IAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('joueur', 'text', array("label"=>"Gestionnaire"))
	    ->add('clan','text', array('label'=>"Type"))
	    ->add('ville','text')
	    ->add('contacts', 'integer', array('max_length'=>1))
	    ->add('etiquette', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des compétences en étiquette','type' => new EtiquetteType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
	    ->add('influence', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste des influences','type' => new InfluenceType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
	    ->add('save', 'submit',array("label"=>"Sauvegarder"));
    }

    public function getName()
    {
        return 'IA';
    }
}
