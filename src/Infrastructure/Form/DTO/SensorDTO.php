<?php

namespace App\Infrastructure\Form\DTO;

class SensorDTO
{
    private ?float $value;
    private ?string $typeId;

    public function __construct(?float $value = null, ?string $typeId = null)
    {
        $this->value = $value;
        $this->typeId = $typeId;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function getTypeId(): ?string
    {
        return $this->typeId;
    }

    public function setValue(?float $value): void
    {
        $this->value = $value;
    }

    public function setTypeId(?string $typeId): void
    {
        $this->typeId = $typeId;
    }
}