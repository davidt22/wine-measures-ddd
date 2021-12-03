<?php

namespace App\Application\Sensor\CreateSensor;

use App\Domain\Model\Sensor\Sensor;
use App\Domain\Model\Sensor\SensorId;
use App\Domain\Model\Sensor\SensorRepositoryInterface;
use App\Domain\Model\Sensor\SensorValue;
use App\Domain\Model\SensorType\SensorTypeId;
use App\Domain\Model\SensorType\SensorTypeRepositoryInterface;

class CreateSensorService
{
    private SensorRepositoryInterface $sensorRepository;
    private SensorTypeRepositoryInterface $sensorTypeRepository;

    public function __construct(
        SensorRepositoryInterface $sensorRepository,
        SensorTypeRepositoryInterface $sensorTypeRepository
    ) {
        $this->sensorRepository = $sensorRepository;
        $this->sensorTypeRepository = $sensorTypeRepository;
    }

    public function execute(CreateSensorRequest $request): Sensor
    {
        $id = SensorTypeId::fromValue($request->getTypeId());

        $sensorType = $this->sensorTypeRepository->byIdOrFail($id);

        $sensor = Sensor::create(
            SensorId::fromValue(null),
            SensorValue::fromValue($request->getValue()),
            $sensorType
        );

        return $this->sensorRepository->save($sensor);
    }
}