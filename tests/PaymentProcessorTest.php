<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PaymentProcessorTest extends TestCase
{
    public function testChargeIsMockedButLogTransactionIsReal(): void
    {
        $processor = $this->getMockBuilder(PaymentProcessor::class)
                          ->onlyMethods(['charge'])
                          ->disableOriginalConstructor()
                          ->getMock();

        $processor->expects($this->once())
                  ->method('charge')
                  ->with(100)
                  ->willReturn('Mocked charge 100');

        $this->assertSame('Mocked charge 100', $processor->charge(100));

        $this->expectOutputString('Transaction for 100 logged');

        $processor->logTransaction(100);
    }
}
