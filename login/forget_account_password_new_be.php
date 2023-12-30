<?php
    session_start();
    include "../connection.php";
    try{
        $newpass = $_POST['txtnewpass'];
        $user = $_SESSION['userNameF'];
        $sql="update Account set password='$newpass' where userName='$user'";
        $conn->query($sql);
        unset($_SESSION['ForgetU']);
        unset($_SESSION['ForgetP']);
        header("Location:index.php");
    }
    catch(Exception $ex){
        $_SESSION['error_login_F']= "<br><br>Lỗi hệ thống.<br>- Mã lỗi: ". $ex->getCode() ."<br>- Chi tiết: ". $ex->getMessage() ."<br>- Tại dòng code: ". $ex->getLine();
        header("Location:forget_account_password_new.php");
    }
?>