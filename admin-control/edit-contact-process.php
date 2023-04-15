
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['contact'])){
        
        // Add Event title
        
        if(empty($_POST['name'])){
            $_SESSION['contactedit'] = "Please Add Contact Name";
            $error = true;
        }else{
            $name = cleanInputField('name');
        }

        if(empty($_POST['phone'])){
            $_SESSION['contactedit'] = "Phone number is required!";
            $error = true;
        }elseif(!is_numeric($_POST['phone'])){
            $_SESSION['contactedit'] = "Invalid phone number!";
            $error = true;
        }else{
            $phone = cleanInputField('phone');
        }
        
        
        $plan = cleanInputField('plan');
        $status = cleanInputField('status');
        $id = cleanInputField('id');
        $contactid = cleanInputField('contactid');
           
        if(empty($_POST['password'])){
            $_SESSION['contactedit'] = "Please Add a password to your account";
            $error = true;
        }else{
            $password = cleanInputField('password');
        }

 

    // Check that there is no error
    
    
    if(!$error){

    
    

    // Check that there is no error

       
        //run SQL here.... 
    
        
        $sql = formQuery("UPDATE ceecontacts SET fullname ='$name', dphone= '$phone', dplan= '$plan',  dstatus ='$status', dpassword= '$password' WHERE id = '$id' AND contactid = '$contactid' ");
        
        if($sql){
            $_SESSION['contactedit'] = "Record updated successfully!";
            header("Location:edit-contact?id=$id&contactid=$contactid");
            
        }else{
            $_SESSION['contactedit']= "Oops! try again later"; 
            header("Location:edit-contact?id=$id&contactid=$contactid");
            
        }
        echo $_SESSION['contactedit'];
    }

}

echo $_SESSION['contactedit'];
header("Location:edit-contact?id=$id&contactid=$contactid");

}