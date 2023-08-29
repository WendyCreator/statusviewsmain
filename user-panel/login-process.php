<?php
session_start();
require_once 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
   
    if(isset($_POST['login'])){

        $user = cleanInputField("user");
        $pass = md5(cleanInputField("pass"));

        ;
        //check
        // $_SESSION['%$#error23$%$'] = '';
        $sql = formQuery("SELECT * FROM ceeverified WHERE (demail='$user') AND dpassword='$pass'");
 
       if($sql->num_rows>0){
            //correct take user to profile page
            $row = $sql->fetch_assoc();
            
            $_SESSION['status'] = $row['dstatus'];
           
            if($_SESSION['status']=='active'){
                $_SESSION['use%#5log#&45@ger%$#pa']= true;
                $_SESSION['email']=$row['demail'];
                $_SESSION['memberid']=$row['memberid'];
                $_SESSION['dplan']=$row['dplan'];
                $_SESSION['password'] = $row['ddata'];
                $_SESSION['image']=$row['dimage'];
                $_SESSION['fullname']=$row['fullname'];
                $_SESSION['memberid']=$row['memberid'];

                $checkpass = $_SESSION['password']; 
                $checkemail = $_SESSION['email']; 
                $_SESSION['checkermsg$%'] = false;
              
                $check = formQuery("SELECT * FROM ceemembers WHERE dpassword = '$checkpass' AND demail = '$checkemail'");
                if($check->num_rows > 0){
                    $_SESSION['checkermsg$%'] = true;
                }

                header("Location:dashboard");
                // echo $_SESSION['fullname'];
            } else{
                // unset($_SESSION['use%#5log#(45@ger%$#pa']);
                header('Location:page-404');
            }

        }else{

            $_SESSION['%$#error23$%$'] = "Sorry! this account doesn't exist";
            header("location: index");
        }
    }

    

}




