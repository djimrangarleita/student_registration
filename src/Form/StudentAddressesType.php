<?php

namespace App\Form;

use App\Entity\StudentAddresses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentAddressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_address_from')
            ->add('date_address_to')
            ->add('monthly_rental')
            ->add('other_details')
            ->add('address_type_code')
            ->add('student')
            ->add('address')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StudentAddresses::class,
        ]);
    }
}
