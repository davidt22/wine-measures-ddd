<?php

namespace App\Infrastructure\Form\DTO;

class MeasurementDTO
{
    private ?int $year;
    private ?string $variety;
    private ?string $type;
    private ?string $color;
    private ?int $temp;
    private ?int $graduation;
    private ?int $ph;
    private ?string $obs;
    private ?string $wineName;

    public function __construct(
        ?int $year = null,
        ?string $variety = null,
        ?string $type = null,
        ?string $color = null,
        ?int $temp = null,
        ?int $graduation = null,
        ?int $ph = null,
        ?string $obs = null,
        ?string $wineName = null
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
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function getVariety(): ?string
    {
        return $this->variety;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getTemp(): ?int
    {
        return $this->temp;
    }

    public function getGraduation(): ?int
    {
        return $this->graduation;
    }

    public function getPh(): ?int
    {
        return $this->ph;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function getWineName(): ?string
    {
        return $this->wineName;
    }

    public function setYear(?int $year): void
    {
        $this->year = $year;
    }

    public function setVariety(?string $variety): void
    {
        $this->variety = $variety;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function setTemp(?int $temp): void
    {
        $this->temp = $temp;
    }

    public function setGraduation(?int $graduation): void
    {
        $this->graduation = $graduation;
    }

    public function setPh(?int $ph): void
    {
        $this->ph = $ph;
    }

    public function setObs(?string $obs): void
    {
        $this->obs = $obs;
    }

    public function setWineName(?string $wineName): void
    {
        $this->wineName = $wineName;
    }
}