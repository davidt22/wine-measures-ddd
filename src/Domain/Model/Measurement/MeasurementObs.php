<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class MeasurementObs
{
    /** @ORM\Column(name="obs", type="string") */
    private string $obs;

    private function __construct(string $value)
    {
        $this->obs = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->obs;
    }

    public function equals(MeasurementObs $measurementObs): bool
    {
        return $this->obs === $measurementObs->value();
    }
}