
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['quote'])){
        
        // Add Video title
        if(empty($_POST['title'])){
            $_SESSION['quotemsg'] = "Please Add a Title";
            $error = true;
        }else{
            $title = cleanInputField('title');
        }
        
        
        // Add video link
        if(empty($_POST['videolink'])){
            $_SESSION['quotemsg'] = "Please Add the video link...";
            $error = true;
            // echo 'yes';
            
    }else{
        $videolink = cleanInputField('videolink');
    }

        // Add video Description
        if(empty($_POST['ddesc'])){
          $videodesc = 'A description of the video';
            
    }else{
        $videodesc = cleanInputField('ddesc');
    }

   

 

  

    // Check that there is no error

    
    if(!$error){
        $vidtitle = strtolower(str_replace(' ','_', $title));
        $vid = $vidtitle.date("Ymdhis").rand(102021, 192021);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO videos SET vid ='$vid', vtitle= '$title', vlink = '$videolink', vdesc='$videodesc'");
        
        if($sql){
            $_SESSION['quotemsg'] = "Record inserted successfully!";
            header('Location:add-video');
            
        }else{
            $_SESSION['quotemsg']= "Oops! try again later"; 
            header('Location:add-video');
            
        }
        echo $_SESSION['quotemsg'];
    }

}

}