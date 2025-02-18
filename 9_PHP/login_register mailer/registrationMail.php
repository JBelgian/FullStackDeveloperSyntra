<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail($sendToName, $sendToMail)
{

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'localhost';
        $mail->SMTPAuth   = false;
        $mail->Port       = 1025;

        //Recipients
        $mail->setFrom('test@syntra.pxl', 'Mailer');
        $mail->addAddress($sendToMail, $sendToName);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome '. $sendToName .' to SyntraPXL';
        $mail->Body    = 'This is to comfirm your email <b>' . $sendToMail .'</b> is correct';
        $mail->AltBody = 'This is a test email sent to MailHog.';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
