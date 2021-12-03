<?php

namespace App\Application\Sensor\CreateSensor;

use App\Domain\Model\Sensor\Sensor;
use App\Domain\Model\Sensor\SensorId;
use App\Domain\Model\Sensor\SensorRepositoryInterface;
use App\Domain\Model\Sensor\SensorValue;
use App\Domain\Model\SensorType\SensorTypeId;
use App\Domain\Model\SensorType\SensorTypeRepositoryInterface;
use App\Domain\Model\User\UserId;
use App\Domain\Model\User\UserRepositoryInterface;

class CreateSensorService
{
    private SensorRepositoryInterface $sensorRepository;
    private SensorTypeRepositoryInterface $sensorTypeRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        SensorRepositoryInterface $sensorRepository,
        SensorTypeRepositoryInterface $sensorTypeRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->sensorRepository = $sensorRepository;
        $this->sensorTypeRepository = $sensorTypeRepository;
        $this->userRepository = $userRepository;
    }

    public function execute(CreateSensorRequest $request): Sensor
    {
        $id = SensorTypeId::fromValue($request->getTypeId());

        $sensorType = $this->sensorTypeRepository->byIdOrFail($id);
        $user = $this->userRepository->byIdOrFail(new UserId($request->getUserId()));

        $sensor = Sensor::create(
            SensorId::fromValue(null),
            SensorValue::fromValue($request->getValue()),
            $sensorType,
            $user
        );

        return $this->sensorRepository->save($sensor);
    }
}