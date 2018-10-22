<?php

namespace App\Form;

use App\Entity\Marketing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarketingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('valor')
            ->add('cantidad')
            ->add('horas')
            ->add('dias')
            ->add('meses')
            ->add('total')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Marketing::class,
        ]);
    }
}
