
<?php

session_start();

if(isset($_POST['unlock'])){
    $unlockpass = md5($_POST['password']);
    if($unlockpass === $_SESSION['password']){
        $_SESSION['adm$5log#$!@ged%$#in'] = true;
        header("Location:dashboard.php");
    }else{
        $_SESSION['msg'] = 'Invalid password ';
        header("Location:auth-lock-screen.php");
    }
}