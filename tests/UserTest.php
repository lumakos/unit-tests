<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testCorrectPasswordAuthenticatesSuccessfully(): void
    {
        $user = new User('dave', 'secret');

        $this->assertTrue($user->authenticate('secret'));   
    }

    public function testIncorrectPasswordFailsAuthentication(): void
    {
        $user = new User('dave', 'secret');

        $this->assertFalse($user->authenticate('tetetete'));   
    }

    // How to test "protected" functions --> Reflection
    public function testPasswordHashIsMinimumLengthUsingReflection(): void
    {
        $reflector = new ReflectionClass(User::class);

        $method = $reflector->getMethod('hashPassword');

        $user = new User('dave', 'secret');

        $hash = $method->invoke($user, 'secret');

        $this->assertGreaterThanOrEqual(60, strlen($hash));
    }

    public function testAlgorithmHasADefaultValue(): void
    {
        $user = new User('dave', 'secret');

        $reflector = new ReflectionClass(User::class);

        $property = $reflector->getProperty('algorithm');

        $value = $property->getValue($user);

        $this->assertNotNull($value);
    }
}