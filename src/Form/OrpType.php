<?php

namespace App\Form;

use App\Entity\Orp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('prename')
            ->add('gender')
            ->add('street')
            ->add('adresse')
            ->add('postalCode')
            ->add('city')
            ->add('email')
            ->add('birthday')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orp::class,
        ]);
    }
}
