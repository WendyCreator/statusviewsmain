<?php

//Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 //Load Composer's autoloader
 require 'vendor/autoload.php';
 $mail = new PHPMailer(true);



 function mailDetails($email,$code){
    // if($result){
                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
        
                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'statusviews303@gmail.com';                     //SMTP username
                    $mail->Password   = 'eelwzvvmrkakxibp';                               //SMTP password    PHPMailer::ENCRYPTION_SMTPS
                    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                    //Recipients
                    $mail->setFrom('statusviews303@gmail.com', 'Mutual Status Viewer');
                    $mail->addAddress($email, 'Esteemed User');
        
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Message From Status Views. Do not reply';
                    $mail->Body    = "
                    <h3 style='color:green;'>Message From Status Views</h3>
                    <p>Here are your login details</p>
                    <ul>
                    <li>username/email: $email</li>
                    <li>password: $code</li>
                    </ul>
                    <p>Login to change your password anytime</p>
                    <a href='https://contactsgain.com/user-panel/index' style='display:block;padding:.8rem;background:#075e54;margin:.5rem;color:#f2f2f2;text-decoration:none;border-radius:5px;font-size:1.1rem; text-align:center;'>Click to login now</a>
                    ";
                 
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert alert-info'> We have sent your login details to your email address.</div>";
            // } else {
            //     $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
            // }
            echo json_encode(['message' =>  $msg]);
}




