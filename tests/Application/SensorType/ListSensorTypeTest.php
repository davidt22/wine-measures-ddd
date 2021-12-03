<?php

namespace App\Tests\Application\SensorType;

use App\Application\SensorType\ListSensorTypeService;
use App\Domain\Model\SensorType\SensorType;
use App\Domain\Model\SensorType\SensorTypeId;
use App\Domain\Model\SensorType\SensorTypeName;
use App\Domain\Model\SensorType\SensorTypeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ListSensorTypeTest extends TestCase
{
    private ListSensorTypeService $listSensorTypeService;
    private SensorTypeRepositoryInterface $sensorTypeRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sensorTypeRepository = $this->createMock(SensorTypeRepositoryInterface::class);
        $this->listSensorTypeService = new ListSensorTypeService($this->sensorTypeRepository);
    }

    public function testListSensorTypesReturnsData()
    {
        $this->sensorTypeRepository
            ->method('searchAll')
            ->willReturn([
                new SensorType(new SensorTypeId(), SensorTypeName::fromValue('sensor 1')),
                new SensorType(new SensorTypeId(), SensorTypeName::fromValue('sensor 2')),
            ]);

        $sensorTypes = $this->listSensorTypeService->execute();

        $this->assertCount(2, $sensorTypes);
    }

    public function testListSensorTypesReturnsEmptyData()
    {
        $this->sensorTypeRepository
            ->method('searchAll')
            ->willReturn([]);

        $sensorTypes = $this->listSensorTypeService->execute();

        $this->assertCount(0, $sensorTypes);
    }
}