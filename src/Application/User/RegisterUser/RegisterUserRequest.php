<?php

namespace App\Application\User\RegisterUser;

class RegisterUserRequest
{
    private string $email;
    private string $encodedPassword;

    public function __construct(string $email, string $encodedPassword)
    {
        $this->email = $email;
        $this->encodedPassword = $encodedPassword;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEncodedPassword(): string
    {
        return $this->encodedPassword;
    }
}