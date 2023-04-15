
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['contact'])){
        
        // Add Event title
        
        if(empty($_POST['name'])){
            $_SESSION['contactmsg'] = "Please Add Contact Name";
            $error = true;
        }else{
            $name = cleanInputField('name');
        }

        if(empty($_POST['phone'])){
            $_SESSION['contactmsg'] = "Phone number is required!";
            $error = true;
        }elseif(!is_numeric($_POST['phone'])){
            $_SESSION['contactmsg'] = "Invalid phone number!";
            $error = true;
        }else{
            $phone = cleanInputField('phone');
        }
        
        
        $plan = cleanInputField('plan');
        $password = cleanInputField('password');
        $code = cleanInputField('code');

 

    // Check that there is no error
    
    
    if(!$error){

    
    

    // Check that there is no error

        $ggid = strtolower(str_replace(' ', '_',  $name));
        $userid = $ggid.date("Ymdhis").rand(10202, 19202);
        $password = md5($password);
        $phone = $code.$phone;
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO ceecontacts SET fullname ='$name', contactid ='$userid', dphone= '$phone', dplan= '$plan', dpassword= '$password'");
        
        if($sql){
            $_SESSION['contactmsg'] = "Record inserted successfully!";
            header('Location:add-contact');
            
        }else{
            $_SESSION['contactmsg']= "Oops! try again later"; 
            header('Location:add-contact');
            
        }
        echo $_SESSION['contactmsg'];
    }

}

echo $_SESSION['contactmsg'];
// header('Location:add-contact');

}