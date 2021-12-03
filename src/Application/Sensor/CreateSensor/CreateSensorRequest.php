<?php

namespace App\Application\Sensor\CreateSensor;

class CreateSensorRequest
{
    private float $value;
    private string $typeId;
    private string $userId;

    public function __construct(float $value, string $typeId, string $userId)
    {
        $this->value = $value;
        $this->typeId = $typeId;
        $this->userId = $userId;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getTypeId(): string
    {
        return $this->typeId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}