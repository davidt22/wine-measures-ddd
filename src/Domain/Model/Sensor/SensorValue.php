<?php

namespace App\Domain\Model\Sensor;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
final class SensorValue
{
    /** @ORM\Column(name="value", type="float") */
    private float $value;

    private function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function fromValue(float $value): self
    {
        return new self($value);
    }

    public function value(): float
    {
        return $this->value;
    }

    public function equals(SensorValue $sensorValue): bool
    {
        return $this->value === $sensorValue->value();
    }
}