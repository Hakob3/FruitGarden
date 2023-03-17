<?php

namespace Tests\Unit;

use App\Models\Tree;
use PHPUnit\Framework\Attributes\DependsExternal;
use PHPUnit\Framework\TestCase;

final class TreeTest extends TestCase
{
    /** @var Tree  */
    private Tree $object;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new Tree();
    }

    /**
     * @return void
     */
    #[DependsExternal(TreeTypeTest::class, 'testCreate')]
    public function testCreate(): void
    {
        $this->assertTrue($this->object->create(), 'tree table not created');
    }
}