<?php

namespace App\Domain\Model\SensorType;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class SensorType
{
    /**
     * @ORM\Embedded(class="SensorTypeId", columnPrefix=false)
     */
    private SensorTypeId $id;

    /**
     * @ORM\Embedded(class="SensorTypeName", columnPrefix=false)
     */
    private SensorTypeName $name;

    public function __construct(?SensorTypeId $id, SensorTypeName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(SensorTypeName $name): SensorType
    {
        return new self(null, $name);
    }

    public function id(): ?SensorTypeId
    {
        return $this->id;
    }

    public function name(): SensorTypeName
    {
        return $this->name;
    }
}