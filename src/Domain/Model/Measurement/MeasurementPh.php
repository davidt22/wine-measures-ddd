<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Embeddable()
 */
final class MeasurementPh
{
    /** @ORM\Column(name="ph", type="integer") */
    private int $ph;

    private function __construct(int $value)
    {
        $this->ph = $value;
    }

    public static function fromValue(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->ph;
    }

    public function equals(MeasurementPh $measurementPh): bool
    {
        return $this->ph === $measurementPh->value();
    }
}