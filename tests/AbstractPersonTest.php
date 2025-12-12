<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AbstractPersonTest extends TestCase
{
    public function testPersonalNameIsTitleAndSurname(): void
    {
        $person = new Doctor('Crusher');

        $this->assertSame('Dr. Crusher', $person->getPersonalName());
    }
    
    public function testPersonalNameIsTitleAndSurnameWithMock(): void
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
                     ->setConstructorArgs(['McCoy'])
                     ->onlyMethods(['getTitle'])
                     ->getMock();

        $mock->method('getTitle')
             ->willReturn('Dr.');

        $this->assertSame('Dr. McCoy', $mock->getPersonalName());
    }
}