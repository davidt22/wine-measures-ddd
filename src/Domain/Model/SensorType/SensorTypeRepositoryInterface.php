<?php

namespace App\Domain\Model\SensorType;

interface SensorTypeRepositoryInterface
{
    public function byIdOrFail(SensorTypeId $id): SensorType;

    public function searchAll(): array;
}