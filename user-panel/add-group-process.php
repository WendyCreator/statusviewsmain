
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['group'])){
        
        // Add Event title
        
        if(empty($_POST['name'])){
            $_SESSION['groupmsg'] = "Please Add a Title";
            $error = true;
        }else{
            $name = cleanInputField('name');
        }
        if(empty($_POST['admin'])){
            $_SESSION['groupmsg'] = "Please Add Admin Name";
            $error = true;
        }else{
            $admin = cleanInputField('admin');
        }
        
        if(empty($_POST['phone'])){
            $_SESSION['groupmsg'] = "Phone number is required!";
            $error = true;
        }elseif(!is_numeric($_POST['phone'])){
            $_SESSION['groupmsg'] = "Invalid phone number!";
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
        if(empty($_POST['desc'])){
            $_SESSION['groupmsg'] = "Please Add a short note about the group";
            $error = true;
            
    }else{
        $desc = cleanInputField('desc');
    }
        if(empty($_POST['glink'])){
            $_SESSION['groupmsg'] = "Please Enter the whatsapp group link";
            $error = true;
            
    }else{
        $glink = cleanInputField('glink');
    }

    $groupcat = cleanInputField('groupcat');

    // Add Event date

 

    // Check that there is no error
    if(!$error){
       
      $finalcheck = false;
        $checkpass = $_SESSION['password']; 
        $checkemail = $_SESSION['email']; 
      
    
        $check = formQuery("SELECT dplan FROM ceemembers WHERE dpassword = '$checkpass' AND demail = '$checkemail'");
        if($check->num_rows > 0){
            $row = $check->fetch_assoc();
            $num = 0;
            $memberplan = strtolower($row['dplan']);
          switch($memberplan){
            case 'basic':
                $num = 2;
                break;
            case 'premium':
                $num = 10;
                break;
            case 'advance':
                $num = 5;
                break;
            default:
                $num = 0;
          }

        }
        $count = formQuery("SELECT * FROM ceegroups WHERE demail = '$checkemail'");
        if($count->num_rows > 0){
            $countch = formQuery("SELECT COUNT(groupid) FROM ceegroups WHERE demail = '$checkemail'");
            $row1 = $countch->fetch_assoc();
            $rownum = $row1['COUNT(groupid)'];
            if($rownum >= $num){
                $_SESSION['groupmsg'] = "You have exceeded the number of groups you can add";
            }else{
                $finalcheck = true;
            }
       
        }else{
            $finalcheck = true;
        }

       
       
   
        

      // Add event featured image
      if($finalcheck){

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
                    $fileDestination = 'groups/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                } else{
                    // echo "File is too big";
                    $_SESSION['groupmsg'] = "File is too big";
                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
                $_SESSION['groupmsg'] = "There is a problem with this file";
                $error = true;
            }
            
        } else{
            // echo "$fileExtention File type not allowed!";
            $_SESSION['groupmsg'] = "File type not allowed";
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }
    

    // Check that there is no error

        $ggid = strtolower(str_replace(' ', '_',  $name));
        $userid = $ggid.date("Ymdhis").rand(10202, 19202);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO ceegroups SET gtitle ='$name', groupadmin ='$admin',dphone ='$phone', groupid ='$userid', demail='$email', gdesc= '$desc', gimage='$fileDestination', gcategory='$groupcat', grouplink = '$glink'");
        
        if($sql){
            $_SESSION['groupmsg'] = "Record inserted successfully!";
            header('Location:add-group');
            
        }else{
            $_SESSION['groupmsg']= "Oops! try again later"; 
            header('Location:add-group');
            
        }
        echo $_SESSION['groupmsg'];
    }

}
}

}

header('Location:add-group');
            