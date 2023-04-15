
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['member'])){
        
        // Add Event title
        
        if(empty($_POST['name'])){
            $_SESSION['memberedit'] = "Please Add the member name";
            $error = true;
        }else{
            $name = cleanInputField('name');
        }
        if(empty($_POST['groupname'])){
            $_SESSION['memberedit'] = "Please Add Group Name";
            $error = true;
        }else{
            $groupname = cleanInputField('groupname');
        }
        
        if(empty($_POST['phone'])){
            $_SESSION['memberedit'] = "Phone number is required!";
            $error = true;
        }elseif(!is_numeric($_POST['phone'])){
            $_SESSION['memberedit'] = "Invalid phone number!";
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
    $memberid = cleanInputField('memberid');
    $id = cleanInputField('id');
    $status = cleanInputField('status');

    // Add Event date

 

    // Check that there is no error
    
    
    if(!$error){

          // php code for image upload

          if(!empty($_FILES['files']['name'])){
     
            $error = false;
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
                        $fileNewName = date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                        $fileDestination = 'members/'.$fileNewName;
                        move_uploaded_file($fileTemp, $fileDestination);
                        // echo $fileDestination;
                       
                    } else{
                        echo "File is too big";
                        $_SESSION['memberedit'] = 'File too big';
                        $error = true;
                    }
                } else{
                    echo "There is a problem with this file";
                    $_SESSION['memberedit'] = 'There is a prblem with this file!';
                    $error = true;
                }
         
            } else{
                echo "$fileExtention File type not allowed!";
                $_SESSION['memberedit'] = ' File type not supported';
                $error = true;
            }
          
                
            $sqlSelect = $conn->query("SELECT * FROM ceemembers WHERE memberid = '$memberid' AND id ='$id' ");
             $row=$sqlSelect->fetch_assoc();
               
         if($error === false){
                if($row['dimage'] and $row['dimage'] != 'no image'){
                   unlink($row['dimage']); 
                }
            $dfileDestination = $fileDestination;
         }else{
            $dfileDestination = $row['dimage'];
        }
    } else{
        $sqlSelect = $conn->query("SELECT * FROM ceemembers WHERE memberid = '$memberid' AND id ='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];
       } 
        
        // echo 'yes';

    // Check that there is no error

      

        // $password = md5($password);
        
        //run SQL here.... 
    
        
        $sql = formQuery("UPDATE ceemembers SET fullname ='$name', groupname ='$groupname',dplan ='$plan', dphone ='$phone', dimage='$dfileDestination', groupcat='$groupcat', dstatus ='$status' WHERE memberid = '$memberid' AND id ='$id'");
        
        if($sql){
            $_SESSION['memberedit'] = "Record Updated successfully!";
            // header('Location:add-member');
            
        }else{
            $_SESSION['memberedit']= "Oops! try again later"; 
            // header('Location:add-member');
            
        }
        echo $_SESSION['memberedit'];
    }

}
header("Location:edit-member?id=$id&memberid=$memberid");
}

echo 'Error';


