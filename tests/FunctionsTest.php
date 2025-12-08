<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

// require dirname(__DIR__) . '/src/lib/functions.php';

final class FunctionsTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            [2, 3, 5],
            [-2, -3, -5],
            [2,-7, -5]
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAddIntegers(int $a, int $b, int $expected): void
    {
        $this->assertSame(5, addIntegers(2, 3));
    }

    public function testAddPositiiveIntegers(): void
    {
        $this->assertSame(5, addIntegers(2, 3));
    }

    public function testAddNegativeIntegers(): void
    {
        $this->assertSame(-5, addIntegers(2, -7));
    }
}
