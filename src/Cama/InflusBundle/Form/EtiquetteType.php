<?php
namespace Cama\InflusBundle\Form;

use Cama\InflusBundle\Constants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtiquetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	->add("type","choice", array("choices"=>Constants::$TYPE_INFLUENCE))
	->add("niveau","integer");
    }
	
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cama\InflusBundle\Entity\Etiquette',
        ));
    }

    public function getName()
    {
        return 'etiquette';
    }
}
