<?php
    session_start();
    include "../connection.php";
    $sql = "select * from account where display = 1";
    $data=$conn->query($sql);
    foreach($data as $d){
        if($d['userName'] == $_POST['txtuserF']){
            $_SESSION['error_login_F']="";
            $_SESSION['userNameF']=$_POST['txtuserF'];
            $_SESSION['ForgetU']=true;
            header("Location:forget_account_password.php");
        }
        else
        {
            $_SESSION['ForgetU']=false;
            $_SESSION['error_login_F'] = "User ".$_POST['txtuserF']." is not exists!";
            header("Location:forget_account_user.php");        
        }
    }
?>