<?php
session_start();
include 'config.php';
// $userid = $_GET['userid'];

$id = $_GET['id'];
$action = $_GET['action'];
$staffuser = $_GET['staffuser'];
$staffid = $_GET['staffid'];

if($action == 'edit'){
    $sql1 = $conn->query("SELECT * FROM tasks WHERE id='$id' ");
    $row = $sql1->fetch_assoc();
    $status = $row['dstatus'];
    $dstatus = $status == 'pending'?'completed':'pending';
    $sql = $conn->query("UPDATE tasks SET dstatus='$dstatus' WHERE  id='$id' ");
    if($sql){
        $_SESSION['taskupdate'] = "<p class='text-success'>Updated successfully!</p>";
        header("Location:staff-profile.php?userid=$staffuser&id=$staffid");
    }else{
        //return error message
        $_SESSION['taskupdate'] = "<p class='text-danger'>Action could not be completed!</p>";
        header("Location:staff-profile.php?userid=$staffuser&id=$staffid");
    }

}
elseif($action == 'delete'){
    $sql = $conn->query("DELETE FROM tasks WHERE  id='$id' ");
    if($sql){
        $_SESSION['taskupdate'] = "<p class='text-success'>Updated successfully!</p>";
        header("Location:staff-profile.php?userid=$staffuser&id=$staffid");
    }else{
        //return error message
        $_SESSION['taskupdate'] = "<p class='text-danger'>Action could not be completed!</p>";
        header("Location:staff-profile.php?userid=$staffuser&id=$staffid");
    }
}else{
    //return error message
    $_SESSION['taskupdate'] = "<p class='text-danger'>Action could not be completed!</p>";
    header("Location:staff-profile.php?userid=$staffuser&id=$staffid");
}


 


