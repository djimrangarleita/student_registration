<?php

namespace App\Form;

use App\Entity\PropertyOwners;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyOwnersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('landlord_name')
            ->add('date_first_rental', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('other_landlord_details')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertyOwners::class,
        ]);
    }
}
