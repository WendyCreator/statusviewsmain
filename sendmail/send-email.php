<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
// PHPMailer::ENCRYPTION_STARTTLS

$mail->Username = "statusviews303@gmail.com";
$mail->Password = "eelwzvvmrkakxibp";
$mail->setFrom('statusviews303@gmail.com', $name);
$mail->addAddress($email, "Dave");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: sent.html");

// cmvwragyebqpjkhr
// mrwqczjcjpastmjx

// bptahaxufuqghgnk
// lyhxuwiiioqeodyf

// phpmailers
// eelwzvvmrkakxibp