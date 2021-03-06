<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Genre;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isbn', TextType::class, ['label' => 'ISBN'])
            ->add('titre', TextType::class, ['label' => 'Titre'])
            ->add('nbpages', IntegerType::class)
            ->add('date_de_parution', DateType::class, [
                'label' => 'Date de parution',
                'attr' => [
                    'class' => 'datepicker'
                ],
                'widget' => 'single_text',
                'html5' => false
            ])
            ->add('note', IntegerType::class, ['label' => 'Note'])
            ->add('auteurs', EntityType::class, [
                'label' => 'Auteurs',
                'class' => Auteur::class,
                'multiple' => true,
                'attr' => [
                    'class' => 'input-field'
                ]
            ])
            ->add('genres', EntityType::class, [
                'label' => 'Genres',
                'class' => Genre::class,
                'multiple' => true,
                'required' => true,
                'attr' => [
                    'class' => 'input-field'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
