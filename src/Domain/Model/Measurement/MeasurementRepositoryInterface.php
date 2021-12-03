<?php

namespace App\Domain\Model\Measurement;

interface MeasurementRepositoryInterface
{
    public function save(Measurement $measurement): Measurement;

    public function searchAll(): array;
}