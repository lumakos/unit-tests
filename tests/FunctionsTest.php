<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// require dirname(__DIR__) . '/src/lib/functions.php';

final class FunctionsTest extends TestCase
{
    public function testAddPositiiveIntegers(): void
    {
        $this->assertSame(5, addIntegers(2, 3));
    }

    public function testAddNegativeIntegers(): void
    {
        $this->assertSame(-5, addIntegers(2, -7));
    }
}
