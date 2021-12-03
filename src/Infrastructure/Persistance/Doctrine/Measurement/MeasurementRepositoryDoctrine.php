<?php

namespace App\Infrastructure\Persistance\Doctrine\Measurement;

use App\Domain\Model\Measurement\Measurement;
use App\Domain\Model\Measurement\MeasurementRepositoryInterface;
use App\Domain\Model\User\User;
use App\Shared\Domain\Exception\DatabaseException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MeasurementRepositoryDoctrine extends ServiceEntityRepository implements MeasurementRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Measurement::class);
    }

    /**
     * @throws DatabaseException
     */
    public function save(Measurement $measurement): Measurement
    {
        try {
            $this->getEntityManager()->persist($measurement);
            $this->getEntityManager()->flush();

            return $measurement;
        } catch (\Exception $exception) {
            throw new DatabaseException($exception->getMessage());
        }
    }

    public function searchAll(): array
    {
        return $this->findAll();
    }
}
