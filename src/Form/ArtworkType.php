<?php

namespace App\Form;

use App\Entity\Artwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('creationDate')
            ->add('createdAt')
            ->add('description')
            ->add('isInCorpus')
            ->add('slug')
            ->add('mainImage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artwork::class,
        ]);
    }
}
