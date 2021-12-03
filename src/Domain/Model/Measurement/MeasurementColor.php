<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Embeddable()
 */
final class MeasurementColor
{
    /** @ORM\Column(name="color", type="string") */
    private string $color;

    private function __construct(string $value)
    {
        $this->color = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->color;
    }

    public function equals(MeasurementColor $measurementColor): bool
    {
        return $this->color === $measurementColor->value();
    }
}