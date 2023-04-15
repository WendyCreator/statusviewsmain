
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['blog'])){
        // echo 'rue';
        
        // Add Event title
        
        if(empty($_POST['blogtitle'])){
            $_SESSION['eventmsg'] = "Please Add a Title";
            $error = true;
        }else{
            $blogtitle = cleanInputField('blogtitle');
        }

        // Add the hosting pastor

        if(empty($_POST['author'])){
            $_SESSION['eventmsg'] = "Please Add the author of this blog";
            $error = true;
        }else{
            $author = cleanInputField('author');
        }
        
        if(empty($_POST['category'])){
            $_SESSION['eventmsg'] = "Please Add Blog Category";
            $error = true;
        }else{
            $category = cleanInputField('category');
        }

        // Add event Description
        if(empty($_POST['blogdetails'])){
            $_SESSION['eventmsg'] = "Please Add a short note about event";
            $error = true;
            
    }else{
        $blogdetail = cleanCK('blogdetails');
    }

    // Add Event date

    $ddate = $_POST['year'].'/'.$_POST['month'].'/'.$_POST['day'];

   
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
                    $fileNewName = 'blog'.date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                    $fileDestination = 'blog/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                } else{
                    // echo "File is too big";
                    $_SESSION['eventmsg'] = "File is too big";
                    $error = true;
                }
            } else{
                // echo "There is a problem with this file";
                $_SESSION['eventmsg'] = "There is a problem with this file";
                $error = true;
            }
            
        } else{
            // echo "$fileExtention File type not allowed!";
            $_SESSION['eventmsg'] = "File type not allowed";
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }
    

    // Check that there is no error


        $userid = date("Ymdhis").rand(102021, 192021);
        
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO blog SET blogid ='$userid', dtitle ='$blogtitle', ddetail = '$blogdetail', ddate ='$ddate', dimage='$fileDestination', bcategory='$category', blogauthor = '$author'");
        
        if($sql){
            $_SESSION['eventmsg'] = "Record inserted successfully!";
            header('Location:add-blog');
            
        }else{
            $_SESSION['eventmsg']= "Oops! try again later"; 
            header('Location:add-blog');
            
        }
        echo $_SESSION['eventmsg'];
    }

}

}