<?php

namespace App\Infrastructure\Controller\Measurement;

use App\Application\Measurement\CreateMeasurement\CreateMeasurementRequest;
use App\Application\Measurement\CreateMeasurement\CreateMeasurementService;
use App\Domain\Model\User\User;
use App\Infrastructure\Form\DTO\MeasurementDTO;
use App\Infrastructure\Form\MeasurementFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/private/measurement')]
class CreateMeasurementController extends AbstractController
{
    #[Route('/new', name: 'new_measurement')]
     public function create(Request $request, CreateMeasurementService $createMeasurementService): Response
    {
         $measurementDTO = new MeasurementDTO();
         $form = $this->createForm(MeasurementFormType::class, $measurementDTO);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             /** @var User $user */
             $user = $this->getUser();

             $createMeasurementService->execute(
                 new CreateMeasurementRequest(
                     $measurementDTO->getYear(),
                     $measurementDTO->getVariety(),
                     $measurementDTO->getType(),
                     $measurementDTO->getColor(),
                     $measurementDTO->getTemp(),
                     $measurementDTO->getGraduation(),
                     $measurementDTO->getPh(),
                     $measurementDTO->getObs(),
                     $measurementDTO->getWineName(),
                     $user->getId()
                 )
             );

            $this->addFlash('success', 'Medición creada correctamente');

            return $this->redirectToRoute('homepage');
         }

          return $this->render('measurement/new.html.twig', [
              'form' => $form->createView()
          ]);
      }
}
