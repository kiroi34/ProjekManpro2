<?php 

include 'koneksi.php';

mysqli_select_db($sambung, "akunjemaat");

if(isset($_POST['oke'])){
    
    $email = $_POST['email'];
    $records = mysqli_query($sambung,"select * from akunjemaat where email='".$email."'  limit 1");
 
    
    if(mysqli_num_rows($records)==1){
        header("location: verifikasiemail.php");
        exit();
        
    }
    else{
        echo "<script>alert('Email Tidak Terdaftar!!'); window.location.href = 'verifikasiemail.php';</script>";
        exit();
    }


        
}
?>