<?php
    session_start();
    include "../connection.php";
    $sql = "select * from account where display = 1";
    $data=$conn->query($sql);
    foreach($data as $d){
        if($d['password'] == $_POST['txtpassF']){
            $_SESSION['error_login_F']="";
            $_SESSION['ForgetP'] = true;
            header("Location:forget_account_password_new.php");
        }
        else
        {
            $_SESSION['error_login_F'] = "Password is wrong!";
            $_SESSION['ForgetP']=false;
            header("Location:forget_account_password.php");        
        }
    }
?>