<?php
namespace Cama\InflusBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LigneType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('value', 'integer');
  }
  public function getName()
  {
    return 'ligne';
  }
}
