<?php

namespace App\Tests\Application\User;

use App\Application\User\RegisterUser\RegisterUserRequest;
use App\Application\User\RegisterUser\RegisterUserService;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepositoryInterface;
use App\Shared\Domain\Exception\DatabaseException;
use PHPUnit\Framework\TestCase;

class RegisterUserTest extends TestCase
{
    private RegisterUserService $registerUserService;
    private UserRepositoryInterface $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->registerUserService = new RegisterUserService($this->userRepository);
    }

    public function testRegisterUserSuccess()
    {
        $this->userRepository
            ->method('save')
            ->willReturn($this->createMock(User::class));

        $request = new RegisterUserRequest('email@email.com', '123456');
        $user = $this->registerUserService->execute($request);

        $this->assertNotNull($user);
    }

    public function testItThrowsException()
    {
        $this->expectException(DatabaseException::class);

        $this->userRepository
            ->method('save')
            ->willThrowException(new DatabaseException());

        $this->registerUserService->execute(new RegisterUserRequest('email@email.com', 'dsade3243dasas'));
    }
}