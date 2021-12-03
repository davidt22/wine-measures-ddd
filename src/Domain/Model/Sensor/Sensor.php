<?php

namespace App\Domain\Model\Sensor;

use App\Domain\Model\SensorType\SensorType;
use App\Domain\Model\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Sensor
{
    /**
     * @ORM\Embedded(class="SensorId", columnPrefix=false)
     */
    private SensorId $id;

    /**
     * @ORM\Embedded(class="SensorValue", columnPrefix=false)
     */
    private SensorValue $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\SensorType\SensorType")
     */
    private SensorType $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\User\User")
     */
    private User $user;

    public function __construct(SensorId $id, SensorValue $value, SensorType $type, User $user)
    {
        $this->id = $id;
        $this->value = $value;
        $this->type = $type;
        $this->user = $user;
    }

    public static function create(SensorId $id, SensorValue $value, SensorType $type, User $user): Sensor
    {
        return new self($id, $value, $type, $user);
    }

    public function id(): SensorId
    {
        return $this->id;
    }

    public function value(): SensorValue
    {
        return $this->value;
    }

    public function type(): SensorType
    {
        return $this->type;
    }

    public function user(): User
    {
        return $this->user;
    }
}