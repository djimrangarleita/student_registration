<?php

namespace App\Form;

use App\Entity\Addresses;
use App\Entity\PropertyOwners;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('university_accommodation_yn', CheckboxType::class, [
                'label' => 'Logement universitaire'
            ])
            ->add('line_1_number_building', TextType::class, [
                'label' => 'Numero de l\'immeuble',
                'attr' => [
                    'placeholder' => 'Entrez le numero de l\'immeuble...',
                ]
            ])
            ->add('line_2_number_street', TextType::class, [
                'label' => 'Numero de la rue',
                'attr' => [
                    'placeholder' => 'Entrez le numero de la rue...',
                ]
            ])
            ->add('line_3_area_locality', TextType::class, [
                'label' => 'Zone de localite',
                'attr' => [
                    'placeholder' => 'Entrez votre zone de localite...',
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Entrez le nom de la ville...',
                ]
            ])
            ->add('zip_code', TextType::class, [
                'label' => 'Code ZIP',
                'attr' => [
                    'placeholder' => 'Entrez le code ZIP',
                ]
            ])
            ->add('state_province_country', TextType::class, [
                'label' => 'Province',
                'attr' => [
                    'placeholder' => 'Entrez le nom de la province...',
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'placeholder' => 'Selectionnez votre pays...',
                
            ])
            
            ->add('landlord', EntityType::class, [
                'class' => PropertyOwners::class,
                'label' => 'Proprietaire',
                'placeholder' => 'Selectionnez le proprietaire...',
            ])

            ->add('other_address_details', TextareaType::class, [
                'label' => 'Autres details de l\'adresse',
                'attr' => [
                    'placeholder' => 'Entrez les details particuliers de l\'adresse...',
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Addresses::class,
        ]);
    }
}
