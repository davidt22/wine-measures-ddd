<?php

namespace App\Application\Measurement\CreateMeasurement;

class CreateMeasurementRequest
{
    private int $year;
    private string $variety;
    private string $type;
    private string $color;
    private int $temp;
    private int $graduation;
    private int $ph;
    private string $obs;
    private string $wineName;
    private string $userId;

    public function __construct(
        int $year,
        string $variety,
        string $type,
        string $color,
        int $temp,
        int $graduation,
        int $ph,
        string $obs,
        string $wineName,
        string $userId
    ) {
        $this->year = $year;
        $this->variety = $variety;
        $this->type = $type;
        $this->color = $color;
        $this->temp = $temp;
        $this->graduation = $graduation;
        $this->ph = $ph;
        $this->obs = $obs;
        $this->wineName = $wineName;
        $this->userId = $userId;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getVariety(): string
    {
        return $this->variety;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getTemp(): int
    {
        return $this->temp;
    }

    public function getGraduation(): int
    {
        return $this->graduation;
    }

    public function getPh(): int
    {
        return $this->ph;
    }

    public function getObs(): string
    {
        return $this->obs;
    }

    public function getWineName(): string
    {
        return $this->wineName;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}