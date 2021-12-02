<?php

namespace App\Infrastructure\Form;


use App\Application\SensorType\ListSensorTypeService;
use App\Domain\Model\SensorType\SensorType;
use App\Infrastructure\Form\DTO\SensorDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SensorFormType extends AbstractType
{
    private ListSensorTypeService $listSensorTypeService;

    public function __construct(ListSensorTypeService $listSensorTypeService)
    {
        $this->listSensorTypeService = $listSensorTypeService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // TODO: getSensorType para el choice
        $types = $this->listSensorTypeService->execute();

        $typesArray = [];
        /** @var SensorType $type */
        foreach ($types as $type) {
          $typesArray[$type->name()->value()] = $type->id()->id();
        }

        $builder
            ->add('value', NumberType::class, [
                'label' => 'Valor',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('typeId', ChoiceType::class, [
                'label' => 'Tipo',
                'required' => true,
                'attr' => ['class' => 'form-control'],
                'choices' => $typesArray
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SensorDTO::class,
        ]);
    }
}
