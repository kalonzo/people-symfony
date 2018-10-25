<?php

namespace App\Form;

use App\Entity\Orps;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrpsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender')
            ->add('name')
            ->add('lastName')
            ->add('street')
            ->add('postalCode')
            ->add('city')
            ->add('email')
            ->add('birthday')
            ->add('idCandidat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orps::class,
        ]);
    }
}
