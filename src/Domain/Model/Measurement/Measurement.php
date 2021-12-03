<?php

namespace App\Domain\Model\Measurement;

use App\Domain\Model\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Measurement
{
    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementId", columnPrefix=false)
     */
    private MeasurementId $id;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementYear", columnPrefix=false)
     */
    private MeasurementYear $year;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementVariety", columnPrefix=false)
     */
    private MeasurementVariety $variety;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementType", columnPrefix=false)
     */
    private MeasurementType $type;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementColor", columnPrefix=false)
     */
    private MeasurementColor $color;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementTemp", columnPrefix=false)
     */
    private MeasurementTemp $temp;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementGraduation", columnPrefix=false)
     */
    private MeasurementGraduation $graduation;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementPh", columnPrefix=false)
     */
    private MeasurementPh $ph;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementObs", columnPrefix=false)
     */
    private MeasurementObs $obs;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Measurement\MeasurementWineName", columnPrefix=false)
     */
    private MeasurementWineName $wineName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\User\User")
     */
    private User $user;

    public function __construct(
        MeasurementId $id,
        MeasurementYear $year,
        MeasurementVariety $variety,
        MeasurementType $type,
        MeasurementColor $color,
        MeasurementTemp $temp,
        MeasurementGraduation $graduation,
        MeasurementPh $ph,
        MeasurementObs $obs,
        MeasurementWineName $wineName,
        User $user
    ) {
        $this->id = $id;
        $this->year = $year;
        $this->variety = $variety;
        $this->type = $type;
        $this->color = $color;
        $this->temp = $temp;
        $this->graduation = $graduation;
        $this->ph = $ph;
        $this->obs = $obs;
        $this->wineName = $wineName;
        $this->user = $user;
    }

    public static function create(
        MeasurementId $id,
        MeasurementYear $year,
        MeasurementVariety $variety,
        MeasurementType $type,
        MeasurementColor $color,
        MeasurementTemp $temp,
        MeasurementGraduation $graduation,
        MeasurementPh $ph,
        MeasurementObs $obs,
        MeasurementWineName $wineName,
        User $user
    ): Measurement {
        return new self(
            $id,
            $year,
            $variety,
            $type,
            $color,
            $temp,
            $graduation,
            $ph,
            $obs,
            $wineName,
            $user
        );
    }

    public function id(): MeasurementId
    {
        return $this->id;
    }

    public function year(): MeasurementYear
    {
        return $this->year;
    }

    public function variety(): MeasurementVariety
    {
        return $this->variety;
    }

    public function type(): MeasurementType
    {
        return $this->type;
    }

    public function color(): MeasurementColor
    {
        return $this->color;
    }

    public function temp(): MeasurementTemp
    {
        return $this->temp;
    }

    public function graduation(): MeasurementGraduation
    {
        return $this->graduation;
    }

    public function ph(): MeasurementPh
    {
        return $this->ph;
    }

    public function obs(): MeasurementObs
    {
        return $this->obs;
    }

    public function wineName(): MeasurementWineName
    {
        return $this->wineName;
    }

    public function user(): User
    {
        return $this->user;
    }
}