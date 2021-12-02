<?php

namespace App\Application\User\RegisterUser;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepositoryInterface;

class RegisterUserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterUserRequest $request): User
    {
        $user = User::create($request->getEmail(), $request->getEncodedPassword());

        return $this->userRepository->save($user);
    }
}