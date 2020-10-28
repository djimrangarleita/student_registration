<?php

namespace App\Form;

use App\Entity\Students;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentsType extends AbstractType
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
            ->add('date_first_rental')
            ->add('date_left_university')
            ->add('other_student_details')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Students::class,
        ]);
    }
}
