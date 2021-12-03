<?php

namespace App\Infrastructure\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LogoutController extends AbstractController
{
    #[Route('/logout', name: 'logout')]
    public function logout()
    {
        $this->addFlash('success', 'Sesión cerrada con exito.');

        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}