<?php

namespace App\DataFixtures;

use App\Application\User\RegisterUser\RegisterUserService;
use App\Domain\Model\Measurement\Measurement;
use App\Domain\Model\Measurement\MeasurementColor;
use App\Domain\Model\Measurement\MeasurementGraduation;
use App\Domain\Model\Measurement\MeasurementId;
use App\Domain\Model\Measurement\MeasurementObs;
use App\Domain\Model\Measurement\MeasurementPh;
use App\Domain\Model\Measurement\MeasurementTemp;
use App\Domain\Model\Measurement\MeasurementType;
use App\Domain\Model\Measurement\MeasurementVariety;
use App\Domain\Model\Measurement\MeasurementWineName;
use App\Domain\Model\Measurement\MeasurementYear;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserPass;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordHasherEncoder;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = User::create(
            'test@test.com',
            UserPass::fromValue('myRealPass')
        );

        $manager->persist($user);

        for ($i = 0; $i < 3; $i++) {
            $measure = Measurement::create(
                new MeasurementId(),
                MeasurementYear::fromValue(2010 + $i),
                MeasurementVariety::fromValue(MeasurementVariety::VALUES[$i]),
                MeasurementType::fromValue('Tipo ' . $i),
                MeasurementColor::fromValue('Rojizo'),
                MeasurementTemp::fromValue(90),
                MeasurementGraduation::fromValue(5 + $i),
                MeasurementPh::fromValue(3 + $i),
                MeasurementObs::fromValue('Nada que observar'),
                MeasurementWineName::fromValue('Vino ' . $i),
                $user
            );

            $manager->persist($measure);
        }

        $manager->flush();
    }
}
