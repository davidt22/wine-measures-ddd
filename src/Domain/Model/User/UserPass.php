<?php

namespace App\Domain\Model\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class UserPass
{
    /** @ORM\Column(name="pass", type="string") */
    private string $pass;

    private function __construct(string $value)
    {
        $this->pass = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->pass;
    }

    public function equals(UserPass $userPass): bool
    {
        return $this->pass === $userPass->value();
    }
}