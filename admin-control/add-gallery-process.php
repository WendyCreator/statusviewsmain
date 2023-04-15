
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['gallery'])){
        
        // Add Event title
        
        if(empty($_POST['galtitle'])){
            $_SESSION['galmsg'] = "Please Add a Title";
            $error = true;
        }else{
            $galtitle = cleanInputField('galtitle');
        }
        
        
        // Add event Description
        if(empty($_POST['galdesc'])){
            $_SESSION['galmsg'] = "Please Add a short note about the image";
            $error = true;
            
    }else{
        $galdesc = cleanInputField('galdesc');
    }

    // Add Event date

 

    // Check that there is no error
    
    
    if(!$error){

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
                    $fileDestination = 'gallery/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                } else{
                    // echo "File is too big";
                    $_SESSION['galmsg'] = "File is too big";
                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
                $_SESSION['galmsg'] = "There is a problem with this file";
                $error = true;
            }
            
        } else{
            // echo "$fileExtention File type not allowed!";
            $_SESSION['galmsg'] = "File type not allowed";
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }
    

    // Check that there is no error

        $ggid = strtolower(str_replace(' ', '_',  $galtitle));
        $userid = $ggid.date("Ymdhis").rand(102021, 192021);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO gallery SET dtitle ='$galtitle', gid ='$userid', ddesc= '$galdesc', dimage='$fileDestination', category='$category'");
        
        if($sql){
            $_SESSION['galmsg'] = "Record inserted successfully!";
            header('Location:add-gallery');
            
        }else{
            $_SESSION['galmsg']= "Oops! try again later"; 
            header('Location:add-gallery');
            
        }
        echo $_SESSION['galmsg'];
    }

}

}