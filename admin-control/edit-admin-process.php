<?php
session_start();
require 'config.php';
$error= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

   

    if(empty($_POST['fullname'])){
        $_SESSION['adminedit'] = "Fullname is required!";
        $error = true;
    }else{
        $fullname = cleanInputField('fullname');
    }
    
    
    
    
    
    if(empty($_POST['phone'])){
        $_SESSION['adminedit'] = "Phone number is required!";
        $error = true;
    }elseif(!is_numeric($_POST['phone'])){
        $_SESSION['adminedit'] = "Invalid phone number!";
        $error = true;
    }else{
        $phone = cleanInputField('phone');
    }
    
    // if(empty($_POST['email'])){
    //     $erremail = "Email is required!";
    //     $error = true;
    // }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //     $erremail = "Invalid email provided!";
    //     $error = true;
    // }else{
    //     $email = cleanInputField('email');
    // }

    
    
    $status = $_POST['status'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    // $dob = $day.'-'.$month.'-'.$year; //05-11-1809
    
  
    

    
    
    
    
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
                        $fileDestination = 'uploads/'.$fileNewName;
                        move_uploaded_file($fileTemp, $fileDestination);
                        // echo $fileDestination;
                       
                    } else{
                        echo "File is too big";
                        $error = true;
                    }
                } else{
                    echo "There is a problem with this file";
                    $error = true;
                }
         
            } else{
                echo "$fileExtention File type not allowed!";
                $error = true;
            }
          
                
            $sqlSelect = $conn->query("SELECT * FROM climaxadmin WHERE userid = '$userid' AND id ='$id' ");
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
        $sqlSelect = $conn->query("SELECT * FROM climaxadmin WHERE userid = '$userid' AND id ='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];
       } 
        
        // echo 'yes';
       
        //run SQL here.... 
       
        
        $sql = formQuery("UPDATE climaxadmin SET fullname ='$fullname', dphone='$phone', dstatus = '$status', drole='$role', dimage='$dfileDestination' WHERE id = '$id' AND userid='$userid'");
        
        if($sql){
            $_SESSION['adminedit'] = "Record updated successfully!";
            header("Location:edit-admin?id=$id&userid=$userid");
            
        }else{
            $_SESSION['adminedit']= "Oops! try again later"; 
            header("Location:edit-admin?id=$id&userid=$userid");

            
        }
        echo $_SESSION['adminedit'];
    }
    







   
}







