<?php

declare(strict_types=1);

abstract class AbstractPerson
{
    public function __construct(private string $surname)
    {
    }

    abstract protected function getTitle(): string;

    public function getPersonalName(): string
    {
        return $this->getTitle() . ' ' . $this->surname;
    }
}
