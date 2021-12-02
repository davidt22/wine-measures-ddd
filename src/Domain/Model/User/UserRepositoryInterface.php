<?php

namespace App\Domain\Model\User;

interface UserRepositoryInterface
{
    public function save(User $user): User;
}