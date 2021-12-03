<?php

namespace App\Domain\Model\Measurement;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Embeddable()
 */
final class MeasurementId
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    private string $id;

    public function __construct(string $id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    public static function fromValue(?string $value): self
    {
        return new self($value);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id();
    }
}