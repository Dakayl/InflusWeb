<?php
namespace Cama\InflusBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LigneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder->add('value', 'integer');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setDefaults(array(
      'data_class' => 'Cama\InflusBundle\Entity\Ligne',
      ));
    }
    
    public function getName()
    {
      return 'ligne';
    }

}
