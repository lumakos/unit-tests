<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    private Queue $q;

    protected function setUp(): void
    {
        $this->q = new Queue();
    }

    protected function tearDown(): void
    {
        unset($this->q);
    }

    public function testNewQueueIsEmpty(): void
    {
        $this->assertSame(0, $this->q->getSize());
    }

    public function testPushAddsItem(): void
    {
        $this->q->push('an item');

        $this->assertSame(1, $this->q->getSize());
    }

    public function testPopAndRemovesItem(): void
    {
        $this->q->push('an item');

        $this->assertSame('an item', $this->q->pop());
        $this->assertSame(0, $this->q->getSize());
    }

    public function testPopTheCorrectItem(): void
    {
        $this->q->push('an item 1');
        $this->q->push('an item 2');

        $this->assertSame('an item 1', $this->q->pop());
    }

    public function testExpectExceptionWhenQueueIsEmpty(): void
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty');
        $this->q->pop();        
    }
}
