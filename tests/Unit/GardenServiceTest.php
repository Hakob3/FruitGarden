<?php

namespace Tests\Unit;

use App\Service\GardenService;
use PHPUnit\Framework\TestCase;

final class GardenServiceTest extends TestCase
{
    /** @var GardenService  */
    private GardenService $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new GardenService();
    }

    /**
     * @return void
     */
    public function testPickingFruitFromTrees(): void
    {
        $this->assertIsArray($this->object->pickingFruitFromTrees(), 'tree_type table not created');
    }
}