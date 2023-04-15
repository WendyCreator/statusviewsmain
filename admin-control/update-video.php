
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['video'])){
        $id = $_POST['id'];
        
        // Add Event title
        if(empty($_POST['title'])){
            $_SESSION['quotedit'] = "Please Add a Title";
            $error = true;
        }else{
            $vtitle = cleanInputField('title');
        }
        
        
        // Add event Description
        if(empty($_POST['vlink'])){
            $_SESSION['quotedit'] = "Please Add a video link";
            $error = true;
            // echo 'yes';
            
    }else{
        $vlink = cleanInputField('vlink');
    }

        if(empty($_POST['vdesc'])){
            $_SESSION['quotedit'] = "Please Add a video description";
            $error = true;
            // echo 'yes';
            
    }else{
        $vdesc = cleanInputField('vdesc');
    }

   

 

  

    // Check that there is no error

    
    if(!$error){

        
        //run SQL here.... 
    
        
        $sql = formQuery("UPDATE videos SET vlink = '$vlink', vtitle = '$vtitle', vdesc = '$vdesc' WHERE id = '$id'");
        
        if($sql){
            $_SESSION['quotedit'] = "Record Updated successfully!";
            header("Location:edit-video?id=$id");
            
        }else{
            $_SESSION['quotedit']= "Oops! try again later"; 
            header("Location:edit-video?id=$id");
            
        }
        echo $_SESSION['quotedit'];
    }

}

}