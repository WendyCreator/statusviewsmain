<?php
session_start();
require_once 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
   
    if(isset($_POST['login'])){

        $user = cleanInputField("user");
        $pass = md5(cleanInputField("pass"));

        ;
        //check
        $_SESSION['error'] = '';
        $sql = formQuery("SELECT * FROM ceegeeadmin WHERE (demail='$user') AND dpassword='$pass'");
 
       if($sql->num_rows>0){
            //correct take user to profile page
            $row = $sql->fetch_assoc();
            
            $_SESSION['status'] = $row['dstatus'];
           
            if($_SESSION['status']=='active'){
                $_SESSION['adm$5log#$!@ged%$#in']= true;
                $_SESSION['email']=$row['demail'];
                $_SESSION['userid']=$row['userid'];
                $_SESSION['role']=$row['drole'];
                $_SESSION['password'] = $row['dpassword'];
                $_SESSION['phone']=$row['dphone'];
                $_SESSION['image']=$row['dimage'];
                $_SESSION['fullname']=$row['fullname'];
                header("Location:dashboard");
                // echo $_SESSION['fullname'];
            } else{
                // unset($_SESSION['adm$5log#$!@ged%$#in']);
                header('Location:page-404');
            }

        }else{
            $_SESSION['error'] = "Sorry! this account doesn't exist";
            header("location: index");
        }
    }

    

}




