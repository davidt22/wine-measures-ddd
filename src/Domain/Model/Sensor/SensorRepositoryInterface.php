<?php

namespace App\Domain\Model\Sensor;

interface SensorRepositoryInterface
{
    public function save(Sensor $sensor): Sensor;
}