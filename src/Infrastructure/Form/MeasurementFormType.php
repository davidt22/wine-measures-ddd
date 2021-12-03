<?php

namespace App\Infrastructure\Form;


use App\Domain\Model\Measurement\MeasurementVariety;
use App\Infrastructure\Form\DTO\MeasurementDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $types = MeasurementVariety::getValues();

        $typesArray = [];
        foreach ($types as $type) {
          $typesArray[$type] = $type;
        }

        $builder
            ->add('year', NumberType::class, [
                'label' => 'Año',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('variety', ChoiceType::class, [
                'label' => 'Variedad',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
                'choices' => $typesArray
            ])
            ->add('type', TextType::class, [
                'label' => 'Tipo',
                'required' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('color', TextType::class, [
                'label' => 'Color',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('temp', NumberType::class, [
                'label' => 'Temperatura',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('graduation', NumberType::class, [
                'label' => 'Graduacion',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('ph', NumberType::class, [
                'label' => 'PH',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('obs', TextType::class, [
                'label' => 'Observaciones',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('wineName', TextType::class, [
                'label' => 'Vino',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MeasurementDTO::class,
        ]);
    }
}
