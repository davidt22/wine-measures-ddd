<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class MeasurementYear
{
    /** @ORM\Column(name="year", type="integer") */
    private int $year;

    private function __construct(int $value)
    {
        $this->year = $value;
    }

    public static function fromValue(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->year;
    }

    public function equals(MeasurementYear $measurementYear): bool
    {
        return $this->year === $measurementYear->value();
    }
}