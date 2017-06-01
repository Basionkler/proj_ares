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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $languages = $options["allow_extra_fields"]['languages'];
        $categories = $options["allow_extra_fields"]['categories'];

        $languagesArray = Array();
        foreach ($languages as $language) {
            $languagesArray[$language->getName()] = $language;
        }

        $categoriesArray = Array();
        foreach ($categories as $category) {
            $categoriesArray[$category->getName()] = $category;
        }

        $builder
            ->add('title', null, [
                'label' => 'Titolo'
            ])
            ->add('language', ChoiceType::class, array(
                'choices' => $languagesArray,
            ))
            ->add('category', ChoiceType::class, array(
                'choices' => $categoriesArray,
            ))
            ->add('description', TextareaType::class, [
                'label' => 'Descrizione'
            ])
            ->add('labels', null, array(
                'label' => 'Etichette'
            ))
            ->add('publishing_date', DateTimeType::class, array (
                'label' => 'Data e Ora pubblicazione'
            ))
            ->add('is_main', CheckboxType::class, array(
                'label' => 'Metti in evidenza',
                'required' => false
            ))
            ->add('thumbnail', FileType::class, array(
                    'label' => 'Antepruma'
                )
            );
        ;
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