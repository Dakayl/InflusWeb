<?php
namespace Cama\InflusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois', 'text')
            ->add('dateLimite', 'date')
            ->add('datePartie', 'date')
            ->add('actions', 'integer')
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'Tour';
    }
}
