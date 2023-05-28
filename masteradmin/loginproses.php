<?php
    require_once 'koneksi.php';

    session_start();

    $usernameinput = $_POST['username'];
    $passwordinput = $_POST['password'];
    $hashed_passwordinput = hash("md5", $password);
    
    $username = "master";
    $password = "master";
    $hashed_password = hash("md5", $password);

    if($usernameinput == $username && $passwordinput == $password){
        $_SESSION['username'] = $username;
        header("location: homeMaster.php");
    } else {
        echo "Username atau password salah";
    }

    $sambung->close();
?>