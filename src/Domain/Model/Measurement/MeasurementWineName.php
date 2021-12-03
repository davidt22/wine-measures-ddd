<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Embeddable()
 */
final class MeasurementWineName
{
    /** @ORM\Column(name="wineName", type="string") */
    private string $wineName;

    private function __construct(string $value)
    {
        $this->wineName = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->wineName;
    }

    public function equals(MeasurementObs $measurementObs): bool
    {
        return $this->wineName === $measurementObs->value();
    }
}