<?php

namespace App\Infrastructure\Controller\Sensor;

use App\Application\Sensor\CreateSensor\CreateSensorRequest;
use App\Application\Sensor\CreateSensor\CreateSensorService;
use App\Infrastructure\Form\DTO\SensorDTO;
use App\Infrastructure\Form\SensorFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sensor')]
class CreateSensorController extends AbstractController
{
    #[Route('/new', name: 'new_sensor')]
     public function create(Request $request, CreateSensorService $createSensorService): Response
    {
         $sensorDTO = new SensorDTO();
         $form = $this->createForm(SensorFormType::class, $sensorDTO);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
            $createSensorService->execute(
                new CreateSensorRequest($sensorDTO->getValue(), $sensorDTO->getTypeId())
            );

            $this->addFlash('success', 'Sensor creado correctamente');

            return $this->redirectToRoute('homepage');
         }

          return $this->render('sensor/new.html.twig', [
              'form' => $form->createView()
          ]);
      }
}
