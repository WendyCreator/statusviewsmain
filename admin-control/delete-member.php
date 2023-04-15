<?php
session_start();
include 'config.php';

if(isset($_GET['memberid']) AND !empty($_GET['memberid']) 
AND isset($_GET['id']) AND !empty($_GET['id'])){
    $memberid = $_GET['memberid'];
    $id = $_GET['id'];
    $sql1 = $conn->query("SELECT * FROM ceemembers WHERE memberid ='$memberid' AND id='$id' ");
    $row = $sql1->fetch_assoc();
    if($row['dimage'] and $row['dimage'] !== 'no image'){
        unlink($row['dimage']);
    }

    $sql = $conn->query("DELETE FROM ceemembers WHERE memberid ='$memberid' AND id='$id'");

    if($sql){
    $_SESSION['memberdelete'] = "Member deleted successfully";

        header("Location:view-contacts");
    }else{
        //return error message
        $_SESSION['memberdelete'] = "Could not complete this action!";
        header("Location:view-contacts");
        
    }

echo $_SESSION['memberdelete'];

}

header("Location:view-members");

