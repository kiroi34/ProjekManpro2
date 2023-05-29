<?php
include 'koneksi.php';
session_start();

$pass = hash("md5",$_POST['password']);
$c_pass = hash("md5",$_POST['cpassword']);
$email = $_POST['email'];



if ( $pass != $c_pass) {
    echo "<script>alert('PASSWORD HARUS SAMA'); window.location.href = 'resetPassword.php?secret=".base64_encode($email)."';</script>";
}else {
    if (isset($_POST['submit'])) { 
        mysqli_query($sambung, "UPDATE `akunjemaat` SET `password`='".$pass."' WHERE email='".$email."' ");
        echo "<script>alert('Reset Password Berhasil'); window.location.href = 'keluar.php?gereja=".$_SESSION['namagereja']."';</script>";
    } else {
        echo "<script>alert('Reset Password Gagal'); window.location.href = 'resetPassword.php?secret=".base64_encode($email)."';</script>";
    }
}




?>