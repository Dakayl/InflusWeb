<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Cama\InflusBundle\Form\LigneType;

class RefugeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	->add("nom","text")
	->add("niveau","integer")
	->add("description","textarea")
        ->add('lignes', 'collection', array("label_attr"=>array("class"=>'smallcoll'),"label"=>'Lignes de sécurité','type' => new LigneType(),'prototype'=>true,'by_reference' => false,'allow_add' => true));
    }
	
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cama\InflusBundle\Entity\Refuge',
        ));
    }

    public function getName()
    {
        return 'refuge';
    }
}
