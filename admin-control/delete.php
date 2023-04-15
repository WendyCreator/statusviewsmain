<?php
include 'config.php';
session_start();

    $action = $_GET['action'];

    // Delete for blog..

    if($action == 'blog'){
        if(isset($_GET['blogid']) AND !empty($_GET['blogid']) 
    AND isset($_GET['id']) AND !empty($_GET['id'])){
        $blogid = $_GET['blogid'];
        $id = $_GET['id'];

        $sql1 = $conn->query("SELECT * FROM $action WHERE blogid='$blogid' AND id='$id' ");
        $row = $sql1->fetch_assoc();
        if($row['dimage'] !== 'no image'){
            unlink($row['dimage']);
        }

        $sql = $conn->query("DELETE FROM $action WHERE blogid='$blogid' AND id='$id' ");

        if($sql){
        $_SESSION['blogupdate'] = "Blog deleted successfully";

            header("Location:view-blogs");
        }else{
            //return error message
            $_SESSION['blogupdate'] = "Could not complete this action!";
            header("Location:view-blogs");
            
        }



    }

    }
    // Delete for properties..

    if($action == 'properties'){
        if(isset($_GET['productid']) AND !empty($_GET['productid']) 
    AND isset($_GET['id']) AND !empty($_GET['id'])){
        $productid = $_GET['productid'];
        $id = $_GET['id'];

        $sql1 = $conn->query("SELECT * FROM $action WHERE productid='$productid' AND id='$id' ");
        $row = $sql1->fetch_assoc();
        if($row['dimage'] !== 'no image'){
            unlink($row['dimage']);
        }

        $sql = $conn->query("DELETE FROM $action WHERE productid='$productid' AND id='$id' ");

        if($sql){
        $_SESSION['propupdate'] = "Property deleted successfully";

            header("Location:view-properties");
        }else{
            //return error message
            $_SESSION['propupdate'] = "Could not complete this action!";
            header("Location:view-properties");
            
        }



    }

    }

    // Delete for gallery

    if($action == 'gallery'){
        if(isset($_GET['gid']) AND !empty($_GET['gid']) 
    AND isset($_GET['id']) AND !empty($_GET['id'])){
        $gid = $_GET['gid'];
        $id = $_GET['id'];
        $sql1 = $conn->query("SELECT * FROM $action WHERE gid ='$gid' AND id='$id' ");
        $row = $sql1->fetch_assoc();
        if($row['dimage'] !== 'no image'){
            unlink($row['dimage']);
        }

        $sql = $conn->query("DELETE FROM $action WHERE gid ='$gid' AND id='$id' ");

        if($sql){
        $_SESSION['galleryupdate'] = "Gallery image deleted successfully";

            header("Location:view-gallery");
        }else{
            //return error message
            $_SESSION['galleryupdate'] = "Could not complete this action!";
            header("Location:view-gallery");
            
        }



    }


    }
  
    // Delete from videos...
    
    if($action == 'videos'){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id = $_GET['id'];
        $vid = $_GET['vid'];
        

        $sql = $conn->query("DELETE FROM $action WHERE id='$id' AND vid = '$vid' ");

        if($sql){
        $_SESSION['quotesupdate'] = "Video deleted successfully";

            header("Location:view-videos");
        }else{
            //return error message
            $_SESSION['quotesupdate'] = "Could not complete this action!";
            header("Location:view-videos");
            
        }



    }


    }
    // Delete from Category...
    
    if($action == 'ceecategories'){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id = $_GET['id'];
        $cid = $_GET['cid'];
        

        $sql = $conn->query("DELETE FROM $action WHERE id='$id' AND cid = '$cid' ");

        if($sql){
        $_SESSION['catupdate'] = "Category deleted successfully";

            header("Location:view-categories");
        }else{
            //return error message
            $_SESSION['catupdate'] = "Could not complete this action!";
            header("Location:view-categories");
            
        }



    }


    }

    if($action == 'ceeverified'){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id = $_GET['id'];
        $memberid = $_GET['memberid'];
        

        $sql = $conn->query("DELETE FROM $action WHERE id='$id' AND memberid = '$memberid' ");

        if($sql){
        $_SESSION['veriupdate'] = "Member deleted successfully";

            header("Location:view-verified");
        }else{
            //return error message
            $_SESSION['veriupdate'] = "Could not complete this action!";
            header("Location:view-verified");
            
        }



    }


    }
  


