<?php

namespace Tests\Unit;

use App\Models\TreeType;
use PHPUnit\Framework\TestCase;

final class TreeTypeTest extends TestCase
{
    /** @var TreeType  */
    private TreeType $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new TreeType();
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->assertTrue($this->object->create(), 'tree_type table not created');
    }
}