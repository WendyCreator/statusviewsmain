<?php
session_start();
include 'config.php';

$error = false;
if(isset($_POST['submit'] )){
    $userid = $_POST['userid'];
    $id = $_POST['id']; 

    $sql1 = $conn->query("SELECT * FROM staffs WHERE userid='$userid' AND id='$id' ");
    if($sql1->num_rows>0){
        $row = $sql1->fetch_assoc();
        // Get staff details
        $duserid = $row['userid'];
        $username = $row['username'];
        $fullname = $row['firstname'].' '. $row['lastname'];

        // get title
        if(empty($_POST['title'])){
            $_SESSION['tasks'] = "Please Add a Title";
            $error = true;
        }else{
            $title = cleanInputField('title');
        }

        // get budget
        if(empty($_POST['budget'])){
           $budget = 00;
        }else{
            $budget = cleanInputField('budget');
        }
        // get start date
        $startdate = $_POST['startday'].'-'. $_POST['startmonth'].'-'. $_POST['startyear'];
        $stopdate = $_POST['stopday'].'-'. $_POST['stopmonth'].'-'. $_POST['stopyear'];

       if(!$error){
        $sql = $conn->query("INSERT INTO tasks SET title='$title', userid ='$duserid', username='$username', fullname='$fullname', startdate ='$startdate', deadline='$stopdate', dbudget='$budget'");
        
        if($sql){
            $_SESSION['tasks'] = "<p class='text-success'>Task added successfully!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['tasks'] = "<p class='text-success'>Task could not be added, try again please!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }
       }

    }else{
        $_SESSION['tasks'] = "<p class='text-danger'>Staff does not exist!</p>";     
    }
       



    }else{
        $_SESSION['tasks'] = "<p class='text-danger'>Action could not be completed!</p>";
        header("Location:staff-profile.php?userid=$userid&id=$id");
    }
    
 


