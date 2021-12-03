<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class MeasurementTemp
{
    /** @ORM\Column(name="temp", type="integer") */
    private int $temp;

    private function __construct(int $value)
    {
        $this->temp = $value;
    }

    public static function fromValue(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->temp;
    }

    public function equals(MeasurementTemp $measurementTemp): bool
    {
        return $this->temp === $measurementTemp->value();
    }
}