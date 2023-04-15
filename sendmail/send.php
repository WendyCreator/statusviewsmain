<?php
require_once 'config.php';
require 'phpmailer.php';
require 'SMTP.php';
require 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

$mail->isSMTP();

// Define smtp host
$mail->Host = 'smtp.gmail.com';

// Set smtp authentication
$mail->SMTPAuth = true;

// Set type of encryption ssl/tls
$mail->SMTPSecure = 'ssl';

// Provide username and password

$mail->Username = "statusviews303@gmail.com";                 
$mail->Password = "eelwzvvmrkakxibp"; 

// set port to connect to smtp
$mail->Port = '465';

$error = false;
$fError = $sError = $eError = $mError = '';

if(isset($_POST['send'])){
    
    // Validate the clients name...

    if(empty($_POST['name'])){
        $fError = "Your name is required!";
        $error = true;
    }else{
        $name = cleanInput('name');
    }

     // Validate the clients email...

    if(empty($_POST['email'])){
        $eError = "Email is required!";
        $error = true;
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $eError = "Please enter correct email!";
            $error = true;
        }else{
            $email = cleanInput('email');
        }
    }

 // Validate the subject...

    if(empty($_POST['subject'])){
        $sError = "Please provide a subject";
        $error = true;
    }else{
        $subject = cleanInput('subject');
    }

 // Validate the clients message...

    if(empty($_POST['message'])){
        $mError = "Please enter your message";
        $error = true;
    }else{
        $message = cleanInput('message');
    }

    // Recipients Email...

    // $mailto = 'info@qisoptimalsolutionsltd.com';
    $mailto = $email;
    $status = 'statusviews303@gmail.com';
  
   
    
  $headers = "From: $mailto \r\n";

  $headers .= "Reply-To: $status \r\n";




    // Send mail Using php mailer
    
    if(!$error){

  

$mail->From = $status;
$mail->FromName = "$name";

$mail->addAddress($email, "Esteemed Member");

$mail->addReplyTo($status, "Reply");



$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = "<p>$message</p>";
// $mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    $_SESSION['message'] = 'Your message has been delivered successfully. Thank you.';
        header('Location:sent.html');
} catch (Exception $e) {
    // echo "Mailer Error: " . $mail->ErrorInfo;
    $_SESSION['message'] = 'Trouble getting your message, please resend. '  . $mail->ErrorInfo;
    echo $_SESSION['message'];
    // header('Location:../contact.php');
}

}


$mail->SMTPClose();
}