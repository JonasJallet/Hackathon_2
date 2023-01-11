<?php

namespace App\Form;

use App\Entity\Collectivity;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', TextType::class)
            ->add('model', TextType::class)
            ->add('mileage', IntType::class)
            ->add('energy', TextType::class)
            ->add('registrationPlate', TextType::class)
            ->add('isAvailable', ChoiceType::class, [
                'choices'  => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('picture', UrlType::class)
            ->add('collectivity', EntityType::class, [
                'class' => Collectivity::class,
                'choice_label' => 'name',
            ])
            ->add('customer', EntityType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
