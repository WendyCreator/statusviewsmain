
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['group'])){
        
        // Add Event title
        
        if(empty($_POST['name'])){
            $_SESSION['groupedit'] = "Please Add a Title";
            $error = true;
        }else{
            $name = cleanInputField('name');
        }
        if(empty($_POST['admin'])){
            $_SESSION['groupedit'] = "Please Add Admin Name";
            $error = true;
        }else{
            $admin = cleanInputField('admin');
        }
        
        if(empty($_POST['phone'])){
            $_SESSION['groupedit'] = "Phone number is required!";
            $error = true;
        }elseif(!is_numeric($_POST['phone'])){
            $_SESSION['groupedit'] = "Invalid phone number!";
            $error = true;
        }else{
            $phone = cleanInputField('phone');
        }

        if(empty($_POST['glink'])){
            $_SESSION['groupedit'] = "Please Enter the whatsapp group link";
            $error = true;
            
    }else{
        $glink = cleanInputField('glink');
    }
       
        // Add Description
        if(empty($_POST['desc'])){
            $_SESSION['groupedit'] = "Please Add a short note about the group";
            $error = true;
            
    }else{
        $desc = cleanInputField('desc');
    }

    $groupcat = cleanInputField('gcategory');
    $groupid = cleanInputField('groupid');
    $id = cleanInputField('id');

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
                    $fileDestination = 'groups/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                    // echo $fileDestination;
                   
                } else{
                    echo "File is too big";
                    $_SESSION['groupedit'] = 'File too big';
                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
                $_SESSION['groupedit'] = 'There is a prblem with this file!';
                $error = true;
            }
     
        } else{
            echo "$fileExtention File type not allowed!";
            $_SESSION['groupedit'] = ' File type not supported';
            $error = true;
        }
      
            
        $sqlSelect = $conn->query("SELECT * FROM ceegroups WHERE groupid = '$groupid' AND id ='$id' ");
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
    $sqlSelect = $conn->query("SELECT * FROM ceegroups WHERE groupid = '$groupid' AND id ='$id' ");
    $row=$sqlSelect->fetch_assoc();
    $dfileDestination = $row['dimage'];
   } 
    
    // echo 'yes';

    // Check that there is no error

       
        
        //run SQL here.... 
    
        
        $sql = formQuery("UPDATE ceegroups SET gtitle ='$name', groupadmin ='$admin',dphone ='$phone', gdesc= '$desc', gimage='$dfileDestination', gcategory='$groupcat', grouplink = '$glink' WHERE groupid = '$groupid' AND id ='$id' ");
        
        if($sql){
            $_SESSION['groupedit'] = "Record Updated successfully!";
            // header('Location:add-group');
            
        }else{
            $_SESSION['groupedit']= "Oops! try again later"; 
            // header('Location:add-group');
            
        }
        echo $_SESSION['groupedit'];
    }

}
header("Location:edit-group?id=$id&groupid=$groupid");


}