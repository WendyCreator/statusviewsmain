<?php
session_start();
include 'config.php';

if(isset($_GET['contactid']) AND !empty($_GET['contactid']) 
AND isset($_GET['id']) AND !empty($_GET['id'])){
    $contactid = $_GET['contactid'];
    $id = $_GET['id'];
    // $sql1 = $conn->query("SELECT * FROM ceecontacts WHERE contactid ='$contactid' AND id='$id' ");
    // $row = $sql1->fetch_assoc();
    // if($row['dimage'] and $row['dimage'] !== 'no image'){
    //     unlink($row['dimage']);
    // }

    $sql = $conn->query("DELETE FROM ceecontacts WHERE contactid ='$contactid' AND id='$id'");

    if($sql){
    $_SESSION['contactdelete'] = "Contact deleted successfully";

        header("Location:view-contacts");
    }else{
        //return error message
        $_SESSION['contactdelete'] = "Could not complete this action!";
        header("Location:view-contacts");
        
    }

echo $_SESSION['contactdelete'];

}

header("Location:view-contacts");

