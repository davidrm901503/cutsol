<?php

namespace App\Form;

use App\Entity\Corte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('espesor', NumberType::class, array(
                'label' => 'Espesor',
                'attr' => array('class' => 'form-control')
            ))
            ->add('vel_corte', IntegerType::class, array(
                'label' => 'Velocidad corte',
                'attr' => array('class' => 'form-control')))
            ->add('t_pinchazo', IntegerType::class, array(
                'label' => 'Tiempo pinchazo',
                'attr' => array('class' => 'form-control')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Corte::class,
        ]);
    }
}
