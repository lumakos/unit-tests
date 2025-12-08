<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

final class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty(): Queue
    {
        $q = new Queue();

        $this->assertSame(0, $q->getSize());

        return $q;
    }

    #[Depends('testNewQueueIsEmpty')]
    public function testPushAddsItem(Queue $q): Queue
    {
        $q->push('an item');

        $this->assertSame(1, $q->getSize());

        return $q;
    }

    #[Depends('testPushAddsItem')]
    public function testPopAndRemovesItem(Queue $q): void
    {
        $this->assertSame('an item', $q->pop());
        $this->assertSame(0, $q->getSize());
    }
}
