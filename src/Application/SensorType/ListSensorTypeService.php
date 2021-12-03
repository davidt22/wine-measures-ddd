<?php

namespace App\Application\SensorType;

use App\Domain\Model\SensorType\SensorTypeRepositoryInterface;

class ListSensorTypeService
{
    private SensorTypeRepositoryInterface $sensorTypeRepository;

    public function __construct(SensorTypeRepositoryInterface $sensorTypeRepository)
    {
        $this->sensorTypeRepository = $sensorTypeRepository;
    }

    public function execute(): array
    {
        return $this->sensorTypeRepository->searchAll();
    }
}