<?php
    require_once 'koneksi.php';

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = hash("md5", $password);

    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$hashed_password'";
    
    $result = $sambung->query($query);

    if($result->num_rows>0){
        $_SESSION['username'] = $username;
        header("location: homeAdmin.php");
    } else {
        echo "Username atau password salah";
        echo $username;
        echo $hashed_password;
    }

    $sambung->close();
?>