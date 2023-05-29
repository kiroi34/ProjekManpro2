<?php 

include 'koneksi.php';
session_start();

mysqli_select_db($sambung, "akunjemaat");

if(isset($_POST['oke'])){
    
    $email = $_POST['email'];
    $records = mysqli_query($sambung,"select * from akunjemaat where email='".$email."'  limit 1");
 
    
    if(mysqli_num_rows($records)==1){
        header("location: verifikasiemail.php?gereja=".$_SESSION['namagereja']);
        exit();
        
    }
    else{
        echo "<script>alert('Email Tidak Terdaftar!!'); window.location.href = 'verifikasiemail.php?gereja=".$_SESSION['namagereja']."';</script>";
        exit();
    }


        
}
?>