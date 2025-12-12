<?php

declare(strict_types=1);

class PaymentProcessor
{
    public function __construct(private string $api_key)
    {
    }

    public function charge(float $amount): string
    {
        // Contact a real payment gateway
        // ...

        return "Charged $amount using API key $this->api_key";
    }

    public function logTransaction(float $amount): void
    {
        echo "Transaction for $amount logged";
    }
}
