
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['blog'])){
        $id = $_POST['id'];
        $blogid = $_POST['blogid'];
        
        // Add Event title
        
        if(empty($_POST['title'])){
            $_SESSION['blogedit'] = "Please Add a Title";
            $error = true;
        }else{
            $blogtitle = cleanInputField('title');
        }

        // Add the hosting pastor

        if(empty($_POST['author'])){
            $_SESSION['blogedit'] = "Please Add the Author";
            $error = true;
        }else{
            $author = cleanInputField('author');
        }
        
        // Add property Description
        if(empty($_POST['ddesc'])){
            $_SESSION['blogedit'] = "Please Add a short note about property";
            $error = true;
            
    }else{
        $ddesc = cleanCK('ddesc');
    }
    
// add category
    
    if(empty($_POST['category'])){
        $_SESSION['blogedit'] = "Please Add Blog Category";
        $error = true;
    }else{
        $category = cleanInputField('category');
    }

    // //////////////////////////








// Check that there is no error

    // $ddate = $_POST['year'].'/'.$_POST['month'].'/'.$_POST['day'];

    // Add event featured image
   if(!$error){
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
                    $blogimg = str_replace(' ', '_', $blogtitle);
                    $fileNewName = $blogimg.date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                    $fileDestination = 'blog/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);

                    $dfileDestination = $fileDestination;
                  
                } else{
                    echo "File is too big";
            $_SESSION['blogedit'] = "File is too big";

                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
            $_SESSION['blogedit'] = "There is a problem with this file";

                $error = true;
            }
            
        } else{
            echo "$fileExtention File type not allowed!";
            $_SESSION['blogedit'] = "File type is not supported";

            $error = true;
        }
        // echo $fileDestination; 
        $sqlSelect = $conn->query("SELECT * FROM blog WHERE blogid = '$blogid' AND id ='$id' ");
        $row1=$sqlSelect->fetch_assoc();
        echo $row1['dimage'];
        if($row1['dimage'] !== 'no image' or !empty($row1['dimage'])){
           unlink($row1['dimage']); 
        }
         

    }else{
        $sqlSelect = $conn->query("SELECT * FROM blog WHERE blogid = '$blogid' AND id ='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];

    }
        
}
    // If no image is added...... replace with the old one

 

    // Check that there is no error

    
    if(!$error){
     
        
        //run SQL here.... 
    
    

        $sql = formQuery("UPDATE blog SET dtitle ='$blogtitle', ddetail = '$ddesc', blogauthor ='$author',dimage='$dfileDestination',bcategory='$category' WHERE blogid = '$blogid' AND id ='$id' ");
        
        if($sql){
            $_SESSION['blogedit'] = "Record Updated successfully!";
            header("Location:edit-blog.php?id=$id&blogid=$blogid");
            
        }else{
            $_SESSION['blogedit']= "Oops! try again later"; 
            header("Location:edit-blog.php?id=$id&blogid=$blogid");
            
        }
        echo $_SESSION['blogedit'];
    }

}


}