<?php 

include 'koneksi.php';

mysqli_select_db($sambung, "akunjemaat");

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password= MD5($_POST['password']);
    $records = mysqli_query($sambung,"select * from akunjemaat where email='".$uname."'OR nomorTelepon='".$uname."'  AND Password='".$password."'  limit 1");
 
    
    if(mysqli_num_rows($records)==1){
        session_start();
        $data = $records->fetch_assoc();
        $_SESSION['user']=$data['idAkun'];
        $_SESSION['masuk'] = 1;
        header("location: Homeuser.php");
        exit();
        
    }
    else{
        echo "<script>alert('Password Atau Username Salah!!'); window.location.href = 'keluar.php';</script>";
        exit();
    }


        
}
?>