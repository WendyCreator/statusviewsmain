
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['member'])){
        
        // Add Event title
        
        if(empty($_POST['name'])){
            $_SESSION['membermsg'] = "Please Add the member name";
            $error = true;
        }else{
            $name = cleanInputField('name');
        }
        if(empty($_POST['groupname'])){
            $_SESSION['membermsg'] = "Please Add Group Name";
            $error = true;
        }else{
            $groupname = cleanInputField('groupname');
        }
        
        if(empty($_POST['phone'])){
            $_SESSION['membermsg'] = "Phone number is required!";
            $error = true;
        }elseif(!is_numeric($_POST['phone'])){
            $_SESSION['membermsg'] = "Invalid phone number!";
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
        // Add event Description
        

    $groupcat = cleanInputField('groupcat');
    $plan = cleanInputField('plan');
    $password = cleanInputField('password');

    // Add Event date

 

    // Check that there is no error
    
    
    if(!$error){

        $checkpass = $_SESSION['password']; 
        $checkemail = $_SESSION['email']; 

        $check = formQuery("SELECT * FROM ceemembers WHERE dpassword = '$checkpass' AND demail = '$checkemail'");
        if($check->num_rows > 0){
            $_SESSION['membermsg'] = "This user is already recorded!";
        }else{

      // Add event featured image

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
                    $galimg = strtolower(str_replace(' ', '_', $galtitle));
                    $fileNewName = $galimg.date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                    $fileDestination = 'members/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                } else{
                    // echo "File is too big";
                    $_SESSION['membermsg'] = "File is too big";
                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
                $_SESSION['membermsg'] = "There is a problem with this file";
                $error = true;
            }
            
        } else{
            // echo "$fileExtention File type not allowed!";
            $_SESSION['membermsg'] = "File type not allowed";
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }
    

    // Check that there is no error

        $ggid = strtolower(str_replace(' ', '_',  $groupname));
        $groupid = $ggid.date("Ymdhis").rand(10202, 19202);

        $mid = strtolower(str_replace(' ', '_',  $name));
        $userid = $mid.date("Ymdhis").rand(10202, 19202);

        $password = md5($password);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO ceemembers SET fullname ='$name', groupname ='$groupname', demail ='$email', dplan ='$plan', dphone ='$phone', groupid ='$groupid', dimage='$fileDestination', memberid ='$userid', dpassword ='$password', groupcat='$groupcat'");
        
        if($sql){
            $_SESSION['membermsg'] = "Record inserted successfully!";
            header('Location:add-member');
            
        }else{
            $_SESSION['membermsg']= "Oops! try again later"; 
            header('Location:add-member');
            
        }
        echo $_SESSION['membermsg'];
    }
}

}

}