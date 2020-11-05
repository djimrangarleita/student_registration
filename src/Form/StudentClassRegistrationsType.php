<?php

namespace App\Form;

use App\Entity\StudentClassRegistrations;
use App\Entity\Students;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentClassRegistrationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('student', EntityType::class, [
                'class' => Students::class,
                'choice_label' => 'email_address',
                'placeholder' => 'Selectionnez l\'etudiant'
                
            ])
            ->add('class')
            // ->add('date_of_registration')
            ->add('date_of_first_class', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('date_of_last_class', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('other_details');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StudentClassRegistrations::class,
        ]);
    }
}
