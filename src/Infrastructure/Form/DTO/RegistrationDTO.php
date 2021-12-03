<?php

namespace App\Infrastructure\Form\DTO;

class RegistrationDTO
{
    private ?string $email;
    private ?string $password;

    public function __construct(?string $email = '', ?string $pass = '')
    {
        $this->email = $email;
        $this->password = $pass;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
}