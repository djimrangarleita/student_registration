<?php

namespace App\Form;

use App\Entity\StudentsPayementMethods;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentsPayementMethodsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bank_details')
            ->add('card_details')
            ->add('other_details')
            ->add('payement_method_code')
            ->add('student')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StudentsPayementMethods::class,
        ]);
    }
}
