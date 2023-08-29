
<?php
session_start();
require_once 'config.php';
require_once 'mail.php';
// require_once 'mail2.php';
// echo(json_encode(['result'=>'yes']));
$result = array('resulte'=>'messagee');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['user-email'])){
        

        // Add email
        
        if(empty($_POST['user-email'])){
            $_SESSION['verifymsg'] = "Please Add Contact Email";
            $error = true;
        }else{
            $email = cleanInputField('user-email');
        }

        // Username 

        if(empty($_POST['user-name'])){
            $_SESSION['verifymsg'] = "Please Add Contact Member name";
            $error = true;
        }else{
            $name = cleanInputField('user-name');
        }

        if(empty($_POST['user-phone'])){
            $_SESSION['verifymsg'] = "Please Add Contact Member Phone number";
            $error = true;
        }else{

            $phone = cleanInputField('user-phone');

        }

     
        
        
        $plan = cleanInputField('plan1');
        $password = cleanInputField('password');
        $amount = cleanInputField('amount-paid');

 

    // Check that there is no error
    
    
    if(!$error){

    
    

    // Check that there is no error

        $ggid = strtolower(str_replace(' ', '_',  $password));
        $userid = $ggid.date("Ymdhis").rand(10202, 19202);
        $ddata = $password;
        $password = md5($password);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO ceeverified SET demail ='$email', dplan ='$plan', fullname ='$name', dphone ='$phone', memberid= '$userid', dpassword= '$password', ddata= '$ddata', damount = '$amount'");
        
        if($sql){
            $_SESSION['verifymsg'] = " Verification Successfull. Your password has been sent to your email!";
            mailDetails($email,$ddata);

            $subject = "Message From Status Views. Do not reply";

            $message =  "
            <h3>Message From Status Views</h3>
            <p>Here are your login details</p>
            <ul>
            <li>username/email: $email</li>
            <li>password: $ddata</li>
            </ul>
            <p>Login to change your password anytime</p>
            <a href='https://contactsgain.com/user-panel/index'>Click to login now</a>
            ";
            // header('Location:add-contact.php');
            header('Location:../user-panel/login');

            // sendMail($email, $subject, $message);
            
        }else{
            $_SESSION['verifymsg']= "Oops! try again later"; 
            // header('Location:add-contact.php');
            
        }
        // echo $_SESSION['verifymsg'];
        echo json_encode(['result' =>  $_SESSION['verifymsg']]);
    }

}

// echo $_SESSION['verifymsg'];
echo json_encode(['result' =>  $_SESSION['verifymsg']]);

// header('Location:add-contact.php');

}