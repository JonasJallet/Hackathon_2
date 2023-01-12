<?php

namespace App\Form;

use App\Entity\Vehicle;
use App\Entity\Collectivity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'brand',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : Mercedes-Benz',
                        'class' => 'form-control'
                    ],
                    'label' => 'Marque',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'model',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : Transit Connect Wagon',
                        'class' => 'form-control'
                    ],
                    'label' => 'Modèle',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'mileage',
                IntegerType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : 355455',
                        'class' => 'form-control'
                    ],
                    'label' => 'Kilométrage',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'energy',
                ChoiceType::class,
                [
                    'attr' =>
                    [
                        'class' => 'form-control'
                    ],
                    'label' => 'Type de carburant',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ],
                    'placeholder' => 'Ex : Electrique',
                    'choices' =>
                    [
                        'Electrique' => 'Electrique',
                        'Hybride' => 'Hybride',
                    ]
                ]
            )
            ->add(
                'registrationPlate',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : ZZ-123-ZZ',
                        'class' => 'form-control'
                    ],
                    'label' => 'Plaque d\'immatriculation',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'picture',
                UrlType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : https://www.url.jpg',
                        'class' => 'form-control'
                    ],
                    'label' => 'Photo',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'isAvailable',
                ChoiceType::class,
                [
                    'attr' =>
                    [
                        'class' => 'form-control'
                    ],
                    'label' => 'Disponibilité',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ],
                    'placeholder' => 'Ex : Oui',
                    'choices'  => [
                        'Oui' => true,
                        'Non' => false,
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
