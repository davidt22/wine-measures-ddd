<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class MeasurementVariety
{
    const VAR1 = 'Var 1';
    const VAR2 = 'Var 2';
    const VAR3 = 'Var 3';
    const VAR4 = 'Var 4';

    const VALUES = [
        self::VAR1,
        self::VAR2,
        self::VAR3,
        self::VAR4
    ];

    /** @ORM\Column(name="variety", type="string") */
    private string $variety;

    private function __construct(string $value)
    {
        if (!$this->validate($value)) {
            throw new \DomainException('Invalid Value');
        }

        $this->variety = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->variety;
    }

    public function equals(MeasurementObs $measurementObs): bool
    {
        return $this->variety === $measurementObs->value();
    }

    private function validate(string $value): bool
    {
        return in_array($value, self::VALUES);
    }

    public static function getValues(): array
    {
        return self::VALUES;
    }
}