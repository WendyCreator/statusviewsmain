<?php
session_start();
include 'config.php';

if(isset($_GET['userid']) AND !empty($_GET['userid']) 
AND isset($_GET['id']) AND !empty($_GET['id'])){
    $userid = $_GET['userid'];
    $id = $_GET['id'];
    $sql1 = $conn->query("SELECT * FROM staffs WHERE userid ='$userid' AND id='$id' ");
    $row = $sql1->fetch_assoc();
    if($row['dimage'] and $row['dimage'] !== 'no image'){
        unlink($row['dimage']);
    }

    $sql = $conn->query("DELETE FROM staffs WHERE userid ='$userid' AND id='$id'");

    if($sql){
    $_SESSION['staffdelete'] = "Detail deleted successfully";

        header("Location:view-staffs");
    }else{
        //return error message
        $_SESSION['staffdelete'] = "Could not complete this action!";
        header("Location:view-staffs");
        
    }

echo $_SESSION['staffdelete'];

}

