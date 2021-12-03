<?php

namespace App\Domain\Model\SensorType;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class SensorTypeName
{
    /** @ORM\Column(name="name", type="string") */
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(SensorTypeName $sensorTypeName): bool
    {
        return $this->value === $sensorTypeName->value();
    }
}