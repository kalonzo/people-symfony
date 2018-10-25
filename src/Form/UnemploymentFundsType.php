<?php

namespace App\Form;

use App\Entity\UnemploymentFunds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UnemploymentFundsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('street')
            ->add('postalCode')
            ->add('city')
            ->add('email')
            ->add('phoneNumber')
            ->add('idDepartment')
            ->add('idCandidat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UnemploymentFunds::class,
        ]);
    }
}
