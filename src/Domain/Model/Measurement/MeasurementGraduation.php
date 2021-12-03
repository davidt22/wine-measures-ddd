<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class MeasurementGraduation
{
    /** @ORM\Column(name="graduation", type="integer") */
    private int $graduation;

    private function __construct(int $value)
    {
        $this->graduation = $value;
    }

    public static function fromValue(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->graduation;
    }

    public function equals(MeasurementGraduation $measurementGraduation): bool
    {
        return $this->graduation === $measurementGraduation->value();
    }
}