<?php

namespace App\Infrastructure\Persistance\Doctrine\SensorType;

use App\Domain\Model\Sensor\Sensor;
use App\Domain\Model\Sensor\SensorRepositoryInterface;
use App\Domain\Model\SensorType\SensorType;
use App\Domain\Model\SensorType\SensorTypeId;
use App\Domain\Model\SensorType\SensorTypeNotFOundException;
use App\Domain\Model\SensorType\SensorTypeRepositoryInterface;
use App\Shared\Domain\Exception\DatabaseException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SensorTypeRepositoryDoctrine extends ServiceEntityRepository implements SensorTypeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SensorType::class);
    }

    public function byIdOrFail(SensorTypeId $id): SensorType
    {
        try {
            return $this->find($id->id());
        } catch (\Exception $exception) {
            throw new SensorTypeNotFOundException($exception->getMessage());
        }
    }

    public function searchAll(): array
    {
        return $this->findAll();
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
