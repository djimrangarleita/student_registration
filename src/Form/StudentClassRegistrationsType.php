<?php

namespace App\Form;

use App\Entity\StudentClassRegistrations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentClassRegistrationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('student')
            ->add('class')
            // ->add('date_of_registration')
            ->add('date_of_first_class')
            ->add('date_of_last_class')
            ->add('other_details')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StudentClassRegistrations::class,
        ]);
    }
}
