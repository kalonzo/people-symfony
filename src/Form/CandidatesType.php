<?php

namespace App\Form;

use App\Entity\Candidates;
use App\Form\Type\GenderType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', GenderType::class)
            ->add('name')
            ->add('lastName')
            ->add('street')
            ->add('postalCode')
            ->add('city')
            ->add('email')
            ->add('birthday')
            ->add('phoneNumber')
            ->add('civilStatus')
            ->add('orpRegistrationDate')
            ->add('doBilan')
            ->add('idDepartment')
            ->add('idOrp')
            ->add('idUnemploymentFund')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidates::class,
        ]);
    }
}
