<?php
session_start();
include 'config.php';


if(isset($_POST['submit'] )){
    $userid = $_POST['userid'];
$id = $_POST['id']; 
     $role = $_POST['role'];

        $sql = $conn->query("UPDATE staffs SET drole='$role' WHERE userid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile?userid=$userid&id=$id");
        }



    }else{
        $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
        header("Location:staff-profile?userid=$userid&id=$id");
    }
    
 


