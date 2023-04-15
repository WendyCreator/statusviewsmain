<?php
session_start();
include 'config.php';


if(isset($_POST['category'] )){
    // $userid = $_POST['userid'];

     $error = false;
     $id = $_POST['id']; 

     if(empty($_POST['title'])){
        $_SESSION['catedit'] = "Please Add a Title";
        $error = true;
    }else{
        $title = cleanInputField('title');
    }
    
    
    // Add event Description
    if(empty($_POST['desc'])){
        $_SESSION['catedit'] = "Please Add a short note about the category";
        $error = true;
        
}else{
    $desc = cleanInputField('desc');
}
    if(!$error){

        $sql = formQuery("UPDATE ceecategories SET ctitle ='$title', cdesc= '$desc' WHERE id='$id'");
        
        if($sql){
            $_SESSION['catedit'] = "Updated successfully!";
            header("Location:edit-category?id=$id");
        }else{
            //return error message
            $_SESSION['catedit'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:edit-category?id=$id");
        }



    }else{
        $_SESSION['catedit'] = "<p class='text-danger'>Action could not be completed!</p>";
        header("Location:edit-category?id=$id");
    }
}

echo 'Error!';
