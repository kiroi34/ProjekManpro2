<?php 

include 'koneksi.php';
session_start();

mysqli_select_db($sambung, "akunjemaat");

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password= MD5($_POST['password']);
    $records = mysqli_query($sambung,"select * from akunjemaat where (email='".$uname."'OR nomorTelepon='".$uname."')  AND Password='".$password."' AND idgereja=".$_SESSION['gereja']);
 
    
    if(mysqli_num_rows($records)==1){
        session_start();
        $data = $records->fetch_assoc();
        $_SESSION['user']=$data['idAkun'];
        $_SESSION['masuk'] = 1;
        header("location: Homeuser.php?gereja=".$_SESSION['namagereja']);
        exit();
        
    }
    else{
        echo "<script>alert('Password Atau Username Salah!!'); window.location.href = 'keluar.php?gereja=".$_SESSION['namagereja']."';</script>";
        exit();
    }


        
}
?>