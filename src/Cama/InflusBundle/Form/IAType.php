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
	    ->add('influence', 'collection', array("label_attr"=>array("class"=>'headcoll'),"label"=>'Liste de ses influences','type' => new InfluenceType(),'prototype'=>true,'by_reference' => false,'allow_add' => true))
	    ->add('save', 'submit',array("label"=>"Sauvegarder"));
    }

    public function getName()
    {
        return 'Possesseur';
    }
}
