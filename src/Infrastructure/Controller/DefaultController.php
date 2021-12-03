<?php

namespace App\Infrastructure\Controller;

use App\Application\Measurement\ListMeasurement\ListMeasurementService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(ListMeasurementService $listMeasurementService): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('login');
        }

        $measurements = $listMeasurementService->execute();

        return $this->render('index.html.twig', [
            'measurements' => $measurements
        ]);
    }
}