<?php
    require_once 'koneksi.php';

    session_start();

    $usernameinput = $_POST['username'];
    $passwordinput = $_POST['password'];
    $hashed_passwordinput = hash("md5", $passwordinput);
    
    $username = "master";
    $password = "master";
    $hashed_password = hash("md5", $password);

    if($usernameinput == $username && $hashed_passwordinput == $hashed_password){
        $_SESSION['username'] = $username;
        header("location: homeMaster.php");
    } else {
        echo "<script>alert('Username atau password salah'); window.location.href = 'homeMaster.php';</script>";
    }

    $sambung->close();
?>