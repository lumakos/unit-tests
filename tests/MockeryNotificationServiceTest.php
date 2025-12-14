<?php

declare(strict_types=1);

use Mockery\Adapter\Phpunit\MockeryTestCase;

final class MockeryNotificationServiceTest extends MockeryTestCase
{
    public function testNotificationIsSent(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')
               ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dave@example.com', 'Hello'));
    }

    public function testSendThrowsException(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')
               ->willThrowException(new RuntimeException('SMTP server down'));

        $service = new NotificationService($mailer);

        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage('Could not send notification');

        $service->sendNotification('dave@example.com', 'Hello');
    }

    public function testMailerIsCalledCorrectly(): void
    {
        $mailer = $this->createMock(Mailer::class);

        $mailer->expects($this->once())
               ->method('sendEmail')
               ->with('dh@example.com', 'New Notification', 'Hi')
               ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dh@example.com', 'Hi'));
    }

    public function testMailerIsCalledCorrectlyWithMockery(): void
    {
        $mailer = Mockery::mock(Mailer::class);

        $mailer->shouldReceive('sendEmail')
               ->once()
               ->with('dh@example.com', 'New Notification', 'Hi')
               ->andReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('dh@example.com', 'Hi'));
    }    
}