
<?php
    session_start();
    require 'config.php';

    $userid = $_SESSION['userid'];
    $email = $_SESSION['email'];

    if(isset($_POST['change'])){
        $old = md5(cleanInputField("oldpass"));
        $pass = md5(cleanInputField("newpass"));
        $cpass = md5(cleanInputField("cnewpass"));
        $inputemail = cleanInputField("email");
    if($inputemail == $email){
      if($pass === $cpass){
        $sql = formQuery("SELECT * FROM ceegeeadmin WHERE dpassword ='$old' ");

          if($sql->num_rows>0){
            //
            formQuery("UPDATE ceegeeadmin SET dpassword ='$pass' WHERE userid='$userid' AND demail='$email'");
            $_SESSION['err'] = "<p class='text-success'>Password changed successfully!</p>";
            header("Location: logout");
          }else{
             //error message here
        $_SESSION['err'] = "<p class='text-danger'>Current password is not correct</p>";
      }
    }else{
    //error message here
     $_SESSION['err'] = "<p class='text-danger'>Passwords do not match!</p>";
    }
 }else{
  $_SESSION['err'] = "<p class='text-danger'>Please Provide accurate data!</p>";
 }
}
      
header("Location: index");