<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    public function testNotificationIsSent(): void
    {
        $mailer = $this->createStub(Mailer::class);
        
        $mailer
            ->method('sendEmail')
            ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('lumakos@gmail.com', 'hello'));
    } 

    public function testSendThrowsException(): void
    {
        $mailer = $this->createStub(Mailer::class);

        $mailer->method('sendEmail')
            ->willThrowException(new RuntimeException('SMTP server down'));

        $service = new NotificationService($mailer);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('SMTP server down');

        $service->sendNotification('lumakos23@gmail.com', 'hello');
    }

    public function testMailerIsCalledCorrectly(): void
    {
        $mailer = $this->createMock(Mailer::class);

        $mailer
            ->expects($this->once())
            ->method('sendEmail')
            ->with('lumakos23@gmail.com', 'New Notification', 'hello')
            ->willReturn(true);

        $service = new NotificationService($mailer);

        $this->assertTrue($service->sendNotification('lumakos23@gmail.com', 'hello'));
    }
}