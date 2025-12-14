<?php

declare(strict_types=1);

class Validator
{
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public function isValidEmailInstance(string $email): bool
    {
        return static::isValidEmail($email);
    }
}
