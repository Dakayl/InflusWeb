<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Cama\InflusBundle\Constants;

class ServantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	->add("type","choice", array("choices"=>Constants::$TYPE_SERVANT))
	->add("nom","text")
	->add("niveau","integer")
	->add("description","textarea");
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cama\InflusBundle\Entity\Servant',
        ));
    }


    public function getName()
    {
        return 'servant';
    }
}
