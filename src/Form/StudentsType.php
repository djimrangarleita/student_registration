<?php

namespace App\Form;

use DateTime;
use App\Entity\Students;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StudentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'Masculin',
                    'Feminin' => 'Feminin',
                ],
                'placeholder' => 'Selectionnez votre genre...',
                'label' => 'Genre',

            ])
            ->add('first_name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom...'
                ]
            ])
            ->add('middle_name', TextType::class, [
                'label' => 'Prenom',
                'attr' => [
                    'placeholder' => 'Entrez votre prenom...',
                ],
                'required' => false,
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Nom de famille',
                'attr' => [
                    'placeholder' => 'Entrez votre nom de famille...'
                ]
            ])
            ->add('cell_mobile_number', TelType::class, [
                'label' => 'Numero de telephone',
                'attr' => [
                    'placeholder' => 'Entrez votre numero de telephone...'
                ]
            ])
            ->add('email_address', EmailType::class, [
                'label' => 'Adresse email',
                'attr' => [
                    'placeholder' => 'Entrez votre adresse email...'
                ]
            ])
            ->add('date_first_rental', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date de '
            ])
            ->add('date_left_university', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de depart...',
                'required' => false,
            ])
            ->add('other_student_details', TextareaType::class, [
                'label' => 'Autres details...',
                'attr' => [
                    'placeholder' => 'Quelques details...'
                ],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Students::class,
        ]);
    }
}
