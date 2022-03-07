<?php

namespace App\Form;

use App\Entity\Regime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('AlimentsAutorises')
            ->add('AlimentsInterdits')
            ->add('PetitDejeuner')
            ->add('Collation1')
            ->add('Dejeuner')
            ->add('Collation2')
            ->add('Diner')
            ->add('Conseils')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Regime::class,
        ]);
    }
}
