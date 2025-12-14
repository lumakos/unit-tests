<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Mockery\Adapter\Phpunit\MockeryTestCase;

#[RunTestsInSeparateProcesses]
final class CustomerTest extends MockeryTestCase
{
    public function testCanCreateCustomerWithValidEmail(): void
    {
        $mock = Mockery::mock('alias:Validator');

        $email = 'dave@example.com';

        $mock->shouldReceive('isValidEmail')
             ->once()
             ->with($email)
             ->andReturn(true);

        $customer = new Customer($email);
    }

    public function testCannotCreateCustomerWithInvalidEmail(): void
    {
        $mock = Mockery::mock('alias:Validator');

        $email = 'daveexample.com';

        $mock->shouldReceive('isValidEmail')
             ->once()
             ->with($email)
             ->andReturn(false);

        $this->expectException(InvalidArgumentException::class);

        $customer = new Customer($email);
    }
}
