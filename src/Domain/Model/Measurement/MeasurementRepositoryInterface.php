<?php

namespace App\Domain\Model\Measurement;

use App\Domain\Model\User\User;

interface MeasurementRepositoryInterface
{
    public function save(Measurement $measurement): Measurement;

    public function byUser(User $user): array;
}