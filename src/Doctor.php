<?php

declare(strict_types=1);

class Doctor extends AbstractPerson
{
    protected function getTitle(): string
    {
        return 'Dr.';
    }
}