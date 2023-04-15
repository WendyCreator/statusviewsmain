
<?php

session_start();

if(isset($_POST['unlock'])){
    $unlockpass = $_POST['password'];
    if($unlockpass === $_SESSION['password']){
        $_SESSION['use%#5log#&45@ger%$#pa'] = true;
        header("Location:dashboard");
    }else{
        $_SESSION['msg'] = 'Invalid password ';
        header("Location:auth-lock-screen");
        
    }
}