<?php 
session_start();
require '../inc/db.php';
if(isset($_POST['submit'])) {
    $oldPassword = filter_var($_POST['old_password'] , FILTER_SANITIZE_STRING);
    $newPassword = filter_var($_POST['new_password'] , FILTER_SANITIZE_STRING);
    $confirmPassword = filter_var($_POST['confirm_password'] , FILTER_SANITIZE_STRING);

    //Check if this email exists or not 
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_email']]);
    $data = $stmt->fetchObject();
    if($data) {
        $check = password_verify($oldPassword , $data->password);
        if($check) {
            if($newPassword === $confirmPassword) {
                $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
                $sql = "UPDATE users SET password=? WHERE email=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$newPassword , $_SESSION['user_email']]);
                header("Location:../show-data.php");
                die();
            }else{
                $_SESSION['error'] = "Password Not The Same";
            }
        }else {
            $_SESSION['error'] = "Password not correct";
        }
    }else {
        $_SESSION['error'] = "Data Not Correct";
    }
}
header("Location:../change-password.php");
