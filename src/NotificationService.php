<?php

declare(strict_types=1);

class NotificationService
{
    public function __construct(private Mailer $mailer) {}

    public function sendNotification(string $recipient_email, string $message): bool
    {
        $subject = 'New Notification';

        return $this->mailer->sendEmail($recipient_email, $subject, $message);
    }
}