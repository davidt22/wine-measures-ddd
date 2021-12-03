<?php

namespace App\Application\Measurement\ListMeasurement;

use App\Domain\Model\Measurement\MeasurementRepositoryInterface;

class ListMeasurementService
{
    private MeasurementRepositoryInterface $measurementRepository;

    public function __construct(MeasurementRepositoryInterface $measurementRepository)
    {
        $this->measurementRepository = $measurementRepository;
    }

    public function execute(): array
    {
        return $this->measurementRepository->searchAll();
    }
}