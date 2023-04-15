<?php
session_start();
include 'config.php';
$userid = $_GET['userid'];
$id = $_GET['id'];
$status = $_GET['status'];

updaterole($status);


    function updaterole($role){
        global $conn;
        global $userid;
        global $id;
        $sql = $conn->query("UPDATE staffs SET dstatus='$role' WHERE userid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile?userid=$userid&id=$id");
        }
    }


