<?php
include_once 'head.php';
    $to = "default@contactsgain.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $contactname = $_REQUEST['contactname'];
    $code = $_REQUEST['code'];
    $phone = $_REQUEST['phone'];
    $phone = $code.$phone;
    // $subject = $_REQUEST['subject'];
    // $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['report'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message. Reporting a contact.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td style='border:none;'><strong>Defaulting Contact:</strong> {$contactname}</td></tr>";
	$body .= "<tr><td style='border:none;'><strong>Defaulting Contact Phone:</strong> {$phone}</td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'><strong>Defaulting Reason:</strong>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    if($send){
        $_SESSION['reportmsg'] = "Message Sent Successfully!";
    }else{
        $_SESSION['reportmsg'] = "Message was not delivered. Please try again.";

    }

    header('Location:report')

?>