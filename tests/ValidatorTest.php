<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

// Test "Static" function
class ValidatorTest extends TestCase
{
    public static function emailProvider(): array
    {
        return [
            'valid email' =>    ['lumakos23@gmail.com', true],
            'no @' =>           ['lumakos23gmail.com', false],
            'invalid domain' => ['lumakos23@invalid_domain', false],
            'empty email' => ['', false],
        ];
    }

    #[DataProvider('emailProvider')]
    public function testEmailValidation(string $email, bool $expected): void
    {
        $this->assertSame($expected, Validator::isValidEmail($email));
    }
}