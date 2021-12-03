<?php

namespace App\Infrastructure\Controller\Security;

use App\Application\User\RegisterUser\RegisterUserRequest;
use App\Application\User\RegisterUser\RegisterUserService;
use App\Domain\Model\User\User;
use App\Infrastructure\Form\DTO\RegistrationDTO;
use App\Infrastructure\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registry', name: 'registry')]
    public function index(
        Request $request,
        RegisterUserService $registerUserService,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $registrationDTO = new RegistrationDTO();
        $form = $this->createForm(RegistrationFormType::class, $registrationDTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = new User();
            $encodedPassword = $passwordHasher->hashPassword($user, $registrationDTO->getPassword());
            $registerUserService->execute(
                new RegisterUserRequest($registrationDTO->getEmail(), $encodedPassword)
            );

            $this->addFlash('success', 'Usuario registrado con exito');

            // TODO: redirect to login
            return $this->redirectToRoute('login');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
