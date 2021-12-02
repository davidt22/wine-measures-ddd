<?php

namespace App\Infrastructure\Controller;

use App\Application\User\RegisterUser\RegisterUserRequest;
use App\Application\User\RegisterUser\RegisterUserService;
use App\Domain\Model\User\User;
use App\Infrastructure\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'registration')]
    public function index(
        Request $request,
        RegisterUserService $registerUserService,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $encodedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $registerUserService->execute(
                new RegisterUserRequest($user->getEmail(), $encodedPassword)
            );

            $this->addFlash('success', 'Usuario registrado con exito');

            // TODO: redirect to login
            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
