<?php

include 'mailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once "mailer/PHPMailer.php";
require_once "mailer/SMTP.php";
require_once "mailer/Exception.php";


 function sendMail($email, $subject, $message){

    $mail = new PHPMailer();
    //SMTP Settings (use default cpanel email account)
    $mail->isSMTP();
    $mail->Host = "webtechs.com.ng"; //
    $mail->SMTPAuth = true;
    $mail->Username = "support@webtechs.com.ng"; // Default cpanel email account
    $mail->Password = '@@mailpass##'; // Default cpanel email password
    $mail->Port = 465; // 587
    $mail->SMTPSecure = "ssl"; // tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom('support@webtechs.com.ng','wallet'); // Email address/ Bank bane shown to reciever
    $mail->addAddress($email);
    $mail->AddReplyTo("support@webtechs.com.ng", "wallet"); // Email address/ Bank bane shown to reciever
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
    $send = $mail->Send();
    return $send;
}

?>