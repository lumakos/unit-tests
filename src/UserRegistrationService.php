<?php

declare(strict_types=1);

class UserRegistrationService
{
	public function __construct(private Closure $validatorCallback)
	{
	}

	public function register(string $email): string
	{
		if ( ! forward_static_call($this->validatorCallback, $email)) {

        	throw new InvalidArgumentException('Invalid email address provided');

    	}

    	// Simulate registration success
    	return "User with email $email registered successfully";
    }
}