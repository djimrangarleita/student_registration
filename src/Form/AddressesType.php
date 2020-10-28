<?php

namespace App\Form;

use App\Entity\Addresses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('university_accommodation_yn')
            ->add('line_1_number_building')
            ->add('line_2_number_street')
            ->add('line_3_area_locality')
            ->add('city')
            ->add('zip_code')
            ->add('state_province_country')
            ->add('country')
            ->add('other_address_details')
            ->add('landlord')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Addresses::class,
        ]);
    }
}
