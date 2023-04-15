<?php
session_start();
require 'config.php';
$error= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

   

    if(empty($_POST['firstname'])){
        $_SESSION['staffedit'] = "Firstname is required!";
        $error = true;
    }else{
        $firstname = cleanInputField('firstname');
    }

    if(empty($_POST['lastname'])){
        $_SESSION['staffedit'] = "Lastname is required!";
        $error = true;
    }else{
        $lastname = cleanInputField('lastname');
    }
    
    if(empty($_POST['address'])){
        $_SESSION['staffedit'] = "Please add an address!";
        $error = true;
    }else{
        $address = cleanInputField('address');
    }
    
    
    
    
    
    if(empty($_POST['phone'])){
        $_SESSION['staffedit'] = "Phone number is required!";
        $error = true;
    }elseif(!is_numeric($_POST['phone'])){
        $_SESSION['staffedit'] = "Invalid phone number!";
        $error = true;
    }else{
        $phone = cleanInputField('phone');
    }
   

    
    $title = $_POST['title'];
    $gender = $_POST['gender'];
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
                        $_SESSION['staffedit'] = 'File too big';
                        $error = true;
                    }
                } else{
                    echo "There is a problem with this file";
                    $_SESSION['staffedit'] = 'There is a prblem with this file!';
                    $error = true;
                }
         
            } else{
                echo "$fileExtention File type not allowed!";
                $_SESSION['staffedit'] = ' File type not supported';
                $error = true;
            }
          
                
            $sqlSelect = $conn->query("SELECT * FROM staffs WHERE userid = '$userid' AND id ='$id' ");
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
        $sqlSelect = $conn->query("SELECT * FROM staffs WHERE userid = '$userid' AND id ='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];
       } 
        
        // echo 'yes';
       
        //run SQL here.... 
       
        
        $sql = formQuery("UPDATE staffs SET firstname ='$firstname', lastname = '$lastname', title='$title',dgender='$gender', dphone='$phone', daddress = '$address', drole='$role', dimage='$dfileDestination' WHERE id = '$id' AND userid='$userid'");
        
        if($sql){
            $_SESSION['staffedit'] = "Record updated successfully!";
            header("Location:edit-staff?id=$id&userid=$userid");
            
        }else{
            $_SESSION['staffedit']= "Oops! try again later"; 
            header("Location:edit-staff?id=$id&userid=$userid");

            
        }
        echo $_SESSION['staffedit'];
    }
    
    header("Location:edit-staff?id=$id&userid=$userid");
   






   
}







