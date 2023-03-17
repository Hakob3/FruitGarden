<?php

namespace Tests\Unit;

use App\Seed\GardenSeeder;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\DependsExternal;
use PHPUnit\Framework\TestCase;

final class GardenSeederTest extends TestCase
{
    /** @var GardenSeeder  */
    private GardenSeeder $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new GardenSeeder();
    }

    /**
     * @return void
     */
    #[DependsExternal(TreeTypeTest::class, 'testCreate')]
    public function testLoadTreeTypes(): void
    {
        $this->assertTrue($this->object->loadTreeTypes(), 'tree_type table seeds not loaded');
    }

    /**
     * @return void
     */
    #[DependsExternal(TreeTest::class, 'testCreate')]
    #[Depends('testLoadTreeTypes')]
    public function testLoadTrees(): void
    {
        $this->assertTrue($this->object->loadTrees(), 'tree table seeds not loaded');
    }
}