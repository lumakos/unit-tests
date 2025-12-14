<?php

declare(strict_types=1);

class Customer
{
    public function __construct(private string $email)
    {
        if (! Validator::isValidEmail($email)) {

            throw new InvalidArgumentException('Invalid email provided');

        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
