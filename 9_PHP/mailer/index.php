<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'localhost';
    $mail->SMTPAuth   = false;
    $mail->Port       = 1025;

    //Recipients
    $mail->setFrom('test@syntra.pxl', 'Mailer');
    $mail->addAddress('joe@jackson.be', 'Joe Jackson');

   //Content
   $mail->isHTML(true);
   $mail->Subject = 'Testing with MailHog';
   $mail->Body    = '<b>This is a test email</b> sent to MailHog.';
   $mail->AltBody = 'This is a test email sent to MailHog.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}