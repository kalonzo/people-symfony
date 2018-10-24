<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\Type\GenderType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', GenderType::class, array(
                'placeholder' => 'Choose your gender',
            ))
            ->add('firstname')
            ->add('lastname')
            ->add('street')
            ->add('postalCode')
            ->add('city')
            ->add('email')
            ->add('birthday')
            ->add('doBilan')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
            
        ]);
    }

}
