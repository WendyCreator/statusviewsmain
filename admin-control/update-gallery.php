<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['gallery'])){
        $id = $_POST['id'];
        
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

  
    


 

    // Check that there is no error

      if(!$error){

        // ///////////
            // Uodate Images...

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
                    $dfileDestination = $fileDestination;
                  
                } else{
                    echo "File is too big";
                    $_SESSION['galedit'] = 'File too big!';
                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
                $_SESSION['galedit'] = 'There is a problem with this file!';
                $error = true;
            }
            
        } else{
            echo "$fileExtention File type not allowed!";
            $_SESSION['galedit'] = 'File type not supported!';
            $error = true;
        }
        // echo $fileDestination; 
        $sqlSelect = $conn->query("SELECT * FROM gallery WHERE id ='$id' ");
        $row1=$sqlSelect->fetch_assoc();
        echo $row1['dimage'];
        if($row1['dimage'] !== 'no image' or !empty($row1['dimage'])){
           unlink($row1['dimage']); 
        }
    }else{
         // If no image is added...... replace with the old one
        $sqlSelect = $conn->query("SELECT * FROM gallery WHERE id ='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];

    }

       

        // //////////   
        //run SQL here.... 
    
        $sql = formQuery("UPDATE gallery SET dtitle ='$galtitle', ddesc = '$galdesc', dimage='$dfileDestination' WHERE id ='$id' ");
        
        if($sql){
            $_SESSION['galedit'] = "Record Updated successfully!";
            header("Location:edit-gallery?id=$id");
            
        }else{
            $_SESSION['galedit']= "Oops! try again later"; 
            header("Location:edit-gallery?id=$id");
            
        }
        echo $_SESSION['galedit'];
    }



}
}