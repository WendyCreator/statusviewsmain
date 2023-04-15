<?php
session_start();
include 'config.php';

if(isset($_GET['groupid']) AND !empty($_GET['groupid']) 
AND isset($_GET['id']) AND !empty($_GET['id'])){
    $groupid = $_GET['groupid'];
    $id = $_GET['id'];
    $sql1 = $conn->query("SELECT * FROM ceegroups WHERE groupid ='$groupid' AND id='$id' ");
    $row = $sql1->fetch_assoc();
    if($row['dimage'] and $row['dimage'] !== 'no image'){
        unlink($row['dimage']);
    }

    $sql = $conn->query("DELETE FROM ceegroups WHERE groupid ='$groupid' AND id='$id'");

    if($sql){
    $_SESSION['groupdelete'] = "Group deleted successfully";

        header("Location:view-groups");
    }else{
        //return error message
        $_SESSION['groupdelete'] = "Could not complete this action!";
        header("Location:view-groups");
        
    }

echo $_SESSION['groupdelete'];

}

header("Location:view-groups");

