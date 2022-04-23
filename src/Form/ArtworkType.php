<?php

namespace App\Form;

use App\Entity\Artwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ArtworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('ref')
            ->add('width')
            ->add('height')
            ->add('isToSold')
            ->add('isSold')
            ->add('price')
            ->add('creationDate', DateType::class, ['format' =>'d-M-y'])
            ->add('createdAt', DateType::class, ['format' =>'d-M-y'])
            ->add('description')
            ->add('isInCorpus')
            ->add('slug')
            ->add('mainImage')
            ->add('category')
            ->add('physicalLocation')
            ->add('corpus')
            ->add('isStar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artwork::class,
        ]);
    }
}
