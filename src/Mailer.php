<?php

declare(strict_types=1);

class Mailer
{
    public function sendEmail(string $recipient_email, string $subject, string $message)
    {
        echo '(sending email..)';

        sleep(3);

        //throw new RuntimeException('SMTP server not reachable');

        return true;
    }
}