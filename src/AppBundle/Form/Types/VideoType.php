<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 31/05/2017
 * Time: 16.58
 */

namespace AppBundle\Form\Types;


use AppBundle\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $languages = $options["allow_extra_fields"]['languages'];

        $languagesArray = Array();
        foreach ($languages as $language) {
            $languagesArray[$language->getName()] = $language->getId();
        }
        $builder
            ->add('title', null, [
                'label' => 'Titolo'
            ])
            ->add('language', ChoiceType::class, array(
                'choices' => $languagesArray,
            ));
    }

    /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}