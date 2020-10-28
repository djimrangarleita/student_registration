<?php

namespace App\Form;

use App\Entity\ParentsAndGuardians;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParentsAndGuardiansType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender')
            ->add('first_name')
            ->add('middle_name')
            ->add('last_name')
            ->add('cell_mobile_number')
            ->add('email_address')
            ->add('other_details')
            ->add('address')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParentsAndGuardians::class,
        ]);
    }
}
