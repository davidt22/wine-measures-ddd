<?php

namespace App\Domain\Model\User;

use App\Shared\Domain\Exception\DatabaseException;

interface UserRepositoryInterface
{
    /**
     * @throws DatabaseException
     */
    public function save(User $user): User;

    public function byIdOrFail(UserId $id): User;
}