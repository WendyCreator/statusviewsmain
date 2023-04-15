<?php
session_start();
include 'config.php';

if(isset($_GET['userid']) AND !empty($_GET['userid']) 
AND isset($_GET['id']) AND !empty($_GET['id'])){
    $userid = $_GET['userid'];
    $id = $_GET['id'];
    $sql1 = $conn->query("SELECT * FROM ceegeeadmin WHERE userid ='$userid' AND id='$id' ");
    $row = $sql1->fetch_assoc();
    if($row['dimage'] !== 'no image'){
        unlink($row['dimage']);
    }

    $sql = $conn->query("DELETE FROM ceegeeadmin WHERE userid ='$userid' AND id='$id'");

    if($sql){
    $_SESSION['admindelete'] = "Detail deleted successfully";

        header("Location:view-admins");
    }else{
        //return error message
        $_SESSION['admindelete'] = "Could not complete this action!";
        header("Location:view-admins");
        
    }

echo $_SESSION['admindelete'];

}

