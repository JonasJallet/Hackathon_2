<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : Timmy',
                        'class' => 'form-control'
                    ],
                    'label' => 'Prénom',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : Brunch',
                        'class' => 'form-control'
                    ],
                    'label' => 'Nom',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'disabilityCard',
                IntegerType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : 156745685',
                        'class' => 'form-control'
                    ],
                    'label' => 'Numéro de carte d\'invalidité',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'phone',
                IntegerType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : 656576858',
                        'class' => 'form-control'
                    ],
                    'label' => 'Téléphone',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'address',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : rue du Bon plaisir',
                        'class' => 'form-control'
                    ],
                    'label' => 'Adresse',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'zipcode',
                IntegerType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : 69000',
                        'class' => 'form-control'
                    ],
                    'label' => 'Code postal',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            )
            ->add(
                'city',
                TextType::class,
                [
                    'attr' =>
                    [
                        'placeholder' => 'Ex : Lyon',
                        'class' => 'form-control'
                    ],
                    'label' => 'Lyon',
                    'label_attr' =>
                    [
                        'class' => 'form-label'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
