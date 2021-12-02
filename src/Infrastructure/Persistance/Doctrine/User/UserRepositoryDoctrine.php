<?php

namespace App\Infrastructure\Persistance\Doctrine\User;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepositoryInterface;
use App\Shared\Domain\Exception\DatabaseException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepositoryDoctrine extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @throws DatabaseException
     */
    public function save(User $user): User
    {
        try {
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();

            return $user;
        } catch (\Exception $exception) {
            throw new DatabaseException($exception->getMessage());
        }
    }
}
