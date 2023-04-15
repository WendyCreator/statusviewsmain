<?php
session_start();
require 'config.php';
// $eeFname=$errLname=$errusername=$erremail=$errphone=$errpass=$errcpass='';
$error= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

   

    if(empty($_POST['firstname'])){
        $_SESSION['staffmsg'] = "Firstname is required!";
        $error = true;
    }else{
        $fname = cleanInputField('firstname');
    }
    
    if(empty($_POST['lastname'])){
        $_SESSION['staffmsg'] = "lastname is required!";
        $error = true;
    }else{
        $lname = cleanInputField('lastname');
    }
    
    if(empty($_POST['username'])){
        $_SESSION['staffmsg'] = "username is required!";
        $error = true;
    }else{

        $username = cleanInputField('username');
        $username = strtolower(str_replace(' ', '',$username));
    }
    
    
    
    if(empty($_POST['phone'])){
        $_SESSION['staffmsg'] = "Phone number is required!";
        $error = true;
    }elseif(!is_numeric($_POST['phone'])){
        $_SESSION['staffmsg'] = "Invalid phone number!";
        $error = true;
    }else{
        $phone = cleanInputField('phone');
    }
    
    if(empty($_POST['email'])){
        $_SESSION['staffmsg'] = "Email is required!";
        $error = true;
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['staffmsg'] = "Invalid email provided!";
        $error = true;
    }else{
        $email = cleanInputField('email');
    }

   
    
    $title = $_POST['title'];
    $role = $_POST['role'];

    if(empty($_POST['pass'])){
        $errpass = "Password is required!";
        $_SESSION['staffmsg'] = 'Password is reqiured!';
        $error = true;
    }elseif(strlen($_POST['pass'])<6){
        $errpass = "Password is too short!";
        $_SESSION['staffmsg'] = 'Password is too short!';

        $error = true;
    }else{
        $pass = cleanInputField('pass');
    }
    
    if(empty($_POST['cpass'])){
        $errcpass = "Confirm Password is required!";
        $_SESSION['staffmsg'] = 'Please confirm your password!';

        $error = true;
    }elseif(empty($errpass)){
        $cpass = cleanInputField('cpass');
        if($pass != $cpass){
            $errcpass = "Password does not match!";
        $_SESSION['staffmsg'] = 'Passwords do not match!';

            $error = true;
        }
    }
  
    
    
    $gender = cleanInputField('gender');
  
    if(empty($_POST['address'])){
        $_SESSION['staffmsg'] = "Please Add Staff's Address";
        $error = true;
    }else{
        $address = cleanInputField('address');
    }
   

   
    
    // echo 'yes';
    if(!$error){

         // php code for image upload
   

    if($_FILES['files']['name'] != ''){
        $files = $_FILES['files'];
        $fileName = $_FILES['files']['name'];
        $fileType = $_FILES['files']['type'];
        $fileTemp = $_FILES['files']['tmp_name'];
        $fileSize = $_FILES['files']['size'];
        $fileError = $_FILES['files']['error'];
     
        
     
        $fileExt = explode('.', $fileName);
        $fileExtention = strtolower(end($fileExt));
        $allowed = array("jpg", "png", "jpeg",'gif');
     
        if(in_array($fileExtention, $allowed)){
            
            if($fileError === 0){
                
                if($fileSize < 1000000000){
                    $imagename = strtolower(str_replace(' ', '',$lname));

                    $fileNewName = $imagename.date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                    $fileDestination = 'staffs/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                } else{
                    $_SESSION['staffmsg'] = 'File to big';
                    $error = true;
                }
            } else{
                $_SESSION['staffmsg'] = 'There is a problem with this file';
                $error = true;
            }
     
        } else{
            $_SESSION['staffmsg'] = 'File type not supported';
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }

        
        // $fullname = $fname . ' ' . $lname;
    $userid = $username.date("Ymdhis").rand(102021, 192021);
    $pass = md5($pass);

        //run SQL here.... 
        echo $email;
        
        $sql = formQuery("INSERT INTO staffs SET userid = '$userid', username='$username', firstname ='$fname', lastname='$lname', demail= '$email', dphone='$phone', title = '$title', dpassword='$pass',drole='$role',dgender = '$gender', daddress='$address', dimage='$fileDestination'");
        
        if($sql){
            $_SESSION['staffmsg'] = "Record inserted successfully!";
            header('Location:register-staff');
            
        }else{
            $_SESSION['staffmsg']= "Oops! try again later"; 
            header('Location:register-staff');
            
        }
    echo $_SESSION['staffmsg'];

    }
    // $_SESSION['staffmsg'] = 'Error detected!';
     header('Location:register-staff');

    







   
}else{
    $_SESSION['staffmsg'] = 'Invalid request method!';
    header('Location:register-staff');

}







