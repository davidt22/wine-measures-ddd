<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Embeddable()
 */
final class MeasurementType
{
    /** @ORM\Column(name="type", type="string") */
    private string $type;

    private function __construct(string $value)
    {
        $this->type = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->type;
    }

    public function equals(MeasurementType $measurementType): bool
    {
        return $this->type === $measurementType->value();
    }
}