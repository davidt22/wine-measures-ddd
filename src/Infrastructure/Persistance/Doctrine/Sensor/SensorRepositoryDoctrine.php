<?php

namespace App\Infrastructure\Persistance\Doctrine\Sensor;

use App\Domain\Model\Sensor\Sensor;
use App\Domain\Model\Sensor\SensorRepositoryInterface;
use App\Shared\Domain\Exception\DatabaseException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SensorRepositoryDoctrine extends ServiceEntityRepository implements SensorRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sensor::class);
    }

    /**
     * @throws DatabaseException
     */
    public function save(Sensor $sensor): Sensor
    {
        try {
            $this->getEntityManager()->persist($sensor);
            $this->getEntityManager()->flush();

            return $sensor;
        } catch (\Exception $exception) {
            throw new DatabaseException($exception->getMessage());
        }
    }
}
