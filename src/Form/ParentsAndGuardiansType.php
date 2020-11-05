<?php

namespace App\Form;

use App\Entity\Addresses;
use App\Entity\ParentsAndGuardians;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParentsAndGuardiansType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'Masculin',
                    'Feminin' => 'Feminin',
                ],
                'attr' => [
                    'placeholder' => 'Selectionnez le genre'
                ]
            ])
            ->add('first_name')
            ->add('middle_name')
            ->add('last_name')
            ->add('cell_mobile_number', TelType::class)
            ->add('email_address', EmailType::class)
            ->add('other_details')
            ->add('address', EntityType::class, [
                'class' => Addresses::class,
                'label' => 'Adresse immeuble',
                'placeholder' => 'Selectionnez l\'adresse'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParentsAndGuardians::class,
        ]);
    }
}
