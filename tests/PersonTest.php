<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require dirname(__DIR__) . '/src/Person.php';

final class PersonTest extends TestCase
{
    public function testGetFullNameAndSurname(): void
    {
        $person = new Person;
        $person->setFirstName('lumakos');
        $person->setSurname('lum');

        $this->assertSame('lumakos lum', $person->getFullName());
    }
}
