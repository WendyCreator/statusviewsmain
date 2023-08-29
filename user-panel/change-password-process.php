
<?php
    session_start();
    require 'config.php';

    // $userid = $_SESSION['userid'];
    $email = $_SESSION['email'];
    $memberid = $_SESSION['memberid'];

    if(isset($_POST['change'])){
        // $old = md5(cleanInputField("oldpass"));
        $old = cleanInputField("oldpass");
        $pass = cleanInputField("newpass");
        $cpass = cleanInputField("cnewpass");
        // $inputemail = cleanInputField("email");

    if($email){
      // echo 'yes';

      if($pass === $cpass){
        $old = md5($old);
        $pass = md5($pass);
        $sql = formQuery("SELECT * FROM ceeverified WHERE dpassword ='$old' ");

          if($sql->num_rows>0){
            //
            $set1 = formQuery("UPDATE ceecontacts SET dpassword ='$pass' WHERE demail='$email' AND memberid = '$memberid'");
            $set2 = formQuery("UPDATE ceeverified SET dpassword ='$pass' WHERE demail='$email' AND memberid = '$memberid'");
            $set3 = formQuery("UPDATE ceemembers SET dpassword ='$pass' WHERE demail='$email' AND memberid = '$memberid'");
          if($set1 and $set2 and $set3){
            $_SESSION['err'] = "<p class='text-success'>Password changed successfully!</p>";
            header("Location: logout");
          }
          }else{
             //error message here
        $_SESSION['err'] = "<p class='text-danger'>Current password is not correct</p>";
        header("Location: auth-recoverpw");
      }
    }else{
    //error message here
     $_SESSION['err'] = "<p class='text-danger'>Passwords do not match!</p>";
     header("Location: auth-recoverpw");
    }
 }
}
header("Location: auth-recoverpw"); 
// header("Location: index");
// N%d@cZ#$u3