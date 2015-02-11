<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Cama\InflusBundle\Constants;

class InfluenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	->add("nom","text")
	->add("type","choice", array("choices"=>Constants::$TYPE_INFLUENCE))
	->add("niveau","integer")
	->add("XP","hidden", array("data"=>0))
	->add("ville","text");
    }

     public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cama\InflusBundle\Entity\Influence',
        ));
    }


    public function getName()
    {
        return 'influence';
    }
}
