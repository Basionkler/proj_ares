<?php

namespace AppBundle\Form\Types;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nickname', null, [
                'label' => 'label.nickname'
            ])
            ->add('name', null, [
                'label' => 'label.name'
            ])
            ->add('lastname', null, [
                'label' => 'label.lastname'
            ])
            ->add('email', null, [
                'label' => 'label.email'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'label.password'
            ]);
    }

    /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}