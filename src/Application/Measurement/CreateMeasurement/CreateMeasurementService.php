<?php

namespace App\Application\Measurement\CreateMeasurement;

use App\Domain\Model\Measurement\Measurement;
use App\Domain\Model\Measurement\MeasurementColor;
use App\Domain\Model\Measurement\MeasurementGraduation;
use App\Domain\Model\Measurement\MeasurementId;
use App\Domain\Model\Measurement\MeasurementObs;
use App\Domain\Model\Measurement\MeasurementPh;
use App\Domain\Model\Measurement\MeasurementRepositoryInterface;
use App\Domain\Model\Measurement\MeasurementTemp;
use App\Domain\Model\Measurement\MeasurementType;
use App\Domain\Model\Measurement\MeasurementVariety;
use App\Domain\Model\Measurement\MeasurementWineName;
use App\Domain\Model\Measurement\MeasurementYear;
use App\Domain\Model\User\UserId;
use App\Domain\Model\User\UserRepositoryInterface;

class CreateMeasurementService
{
    private MeasurementRepositoryInterface $measurementRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        MeasurementRepositoryInterface $measurementRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->measurementRepository = $measurementRepository;
        $this->userRepository = $userRepository;
    }

    public function execute(CreateMeasurementRequest $request): Measurement
    {
        $user = $this->userRepository->byIdOrFail(new UserId($request->getUserId()));

        $measurement = Measurement::create(
            MeasurementId::fromValue(null),
            MeasurementYear::fromValue($request->getYear()),
            MeasurementVariety::fromValue($request->getVariety()),
            MeasurementType::fromValue($request->getType()),
            MeasurementColor::fromValue($request->getColor()),
            MeasurementTemp::fromValue($request->getTemp()),
            MeasurementGraduation::fromValue($request->getGraduation()),
            MeasurementPh::fromValue($request->getPh()),
            MeasurementObs::fromValue($request->getObs()),
            MeasurementWineName::fromValue($request->getWineName()),
            $user
        );

        return $this->measurementRepository->save($measurement);
    }
}