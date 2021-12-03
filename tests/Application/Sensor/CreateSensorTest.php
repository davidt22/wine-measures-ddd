<?php

namespace App\Tests\Application\Sensor;

use App\Application\Sensor\CreateSensor\CreateSensorRequest;
use App\Application\Sensor\CreateSensor\CreateSensorService;
use App\Domain\Model\Sensor\Sensor;
use App\Domain\Model\Sensor\SensorId;
use App\Domain\Model\Sensor\SensorRepositoryInterface;
use App\Domain\Model\Sensor\SensorValue;
use App\Domain\Model\SensorType\SensorType;
use App\Domain\Model\SensorType\SensorTypeId;
use App\Domain\Model\SensorType\SensorTypeName;
use App\Domain\Model\SensorType\SensorTypeNotFOundException;
use App\Domain\Model\SensorType\SensorTypeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class CreateSensorTest extends TestCase
{
    private CreateSensorService $createSensorService;
    private SensorRepositoryInterface $sensorRepository;
    private SensorTypeRepositoryInterface $sensorTypeRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sensorRepository = $this->createMock(SensorRepositoryInterface::class);
        $this->sensorTypeRepository = $this->createMock(SensorTypeRepositoryInterface::class);
        $this->createSensorService = new CreateSensorService($this->sensorRepository, $this->sensorTypeRepository);
    }

    public function testItCreateSensorSuccess()
    {
        $sensorType = new SensorType(new SensorTypeId('a123'), SensorTypeName::fromValue('sensor'));
        $this->sensorTypeRepository
            ->method('byIdOrFail')
            ->willReturn($sensorType);

        $newSensor = Sensor::create(
            new SensorId('12da34'),
            SensorValue::fromValue(0.1),
            $sensorType
        );
        $this->sensorRepository
            ->method('save')
            ->willReturn($newSensor);

        $request = new CreateSensorRequest(0.1, 'a123');
        $sensor = $this->createSensorService->execute($request);

        $this->assertEquals(0.1, $sensor->value()->value());
        $this->assertEquals('a123', $sensor->type()->id());
    }

    public function testItCreateSensorFails()
    {
        $this->expectException(SensorTypeNotFOundException::class);

        $sensorType = new SensorType(new SensorTypeId('a123'), SensorTypeName::fromValue('sensor'));
        $this->sensorTypeRepository
            ->method('byIdOrFail')
            ->willThrowException(new SensorTypeNotFOundException());

        $newSensor = Sensor::create(
            new SensorId('12da34'),
            SensorValue::fromValue(0.1),
            $sensorType
        );
        $this->sensorRepository
            ->method('save')
            ->willReturn($newSensor);

        $request = new CreateSensorRequest(0.1, 'a123');
        $this->createSensorService->execute($request);
    }
}