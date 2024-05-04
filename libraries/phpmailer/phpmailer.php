<?php
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function phpmailer($email, $subject, $body)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        /*$mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.office365.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'yunus.tan@outlook.com.tr'; //SMTP username
        $mail->Password = 'vPDn9jT55XSJKs'; //SMTP password
        $mail->SMTPSecure = 'tls';
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`*/





        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'detrice@kohparenting.com'; //SMTP username
        $mail->Password = 'phxbexwabgjpuhpp'; //APP password
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('info@kohparenting.com', 'Koh-Parenting Services');
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`




        //Recipients
        $mail->addAddress($email); //Add a recipient name is optional
        $mail->addReplyTo('info@kohparenting.com', 'Information');

        //Attachments
        /*$mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name*/

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false; //"Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



?>