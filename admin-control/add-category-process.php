
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['category'])){
        
        // Add Event title
        
        if(empty($_POST['title'])){
            $_SESSION['catmsg'] = "Please Add a Title";
            $error = true;
        }else{
            $title = cleanInputField('title');
        }
        
        
        // Add event Description
        if(empty($_POST['desc'])){
            $_SESSION['catmsg'] = "Please Add a short note about the category";
            $error = true;
            
    }else{
        $desc = cleanInputField('desc');
    }

    // Add Event date

 

    // Check that there is no error
    
    
    if(!$error){

    
    

    // Check that there is no error

        $ggid = strtolower(str_replace(' ', '_',  $title));
        $userid = $ggid.date("Ymdhis").rand(10202, 19202);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO ceecategories SET ctitle ='$title', cid ='$userid', cdesc= '$desc'");
        
        if($sql){
            $_SESSION['catmsg'] = "Record inserted successfully!";
            header('Location:add-category');
            
        }else{
            $_SESSION['catmsg']= "Oops! try again later"; 
            header('Location:add-category');
            
        }
        echo $_SESSION['catmsg'];
    }

}

}