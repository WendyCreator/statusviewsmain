<?php

function sendMail($email, $subject, $message){
    $to = $email;
// $subject = "This is subject";

// $message = "<b>This is HTML message.</b>";
// $message .= "<h1>This is headline.</h1>";

$header = "From:statusviews303@gmail.com \r\n";
// $header .= "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

if( $retval == true ) {
    $msg = "<div class='alert alert-info'> We have sent your login details to your email address.</div>";
}else {
    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
}

echo $msg;
}