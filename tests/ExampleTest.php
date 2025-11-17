<?php

declare(strict_type=1);

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testTwoValuesAreSame() : void 
    {
        $this->assertSame(1, 1);
    }
}