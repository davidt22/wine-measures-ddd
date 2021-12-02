<?php

namespace App\Application\Sensor\CreateSensor;

class CreateSensorRequest
{
    private float $value;
    private string $typeId;

    public function __construct(float $value, string $typeId)
    {
        $this->value = $value;
        $this->typeId = $typeId;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getTypeId(): string
    {
        return $this->typeId;
    }
}