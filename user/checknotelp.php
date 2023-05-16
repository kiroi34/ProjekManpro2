<?php 

include 'koneksi.php';

mysqli_select_db($sambung, "akunjemaat");

if(isset($_POST['oke'])){
    
    $nomorTelpon = $_POST['notelp'];
    $records = mysqli_query($sambung,"select * from akunjemaat where nomorTelepon='".$nomorTelpon."'  limit 1");
 
    
    if(mysqli_num_rows($records)==1){
        header("location: verifikasinomorhp.php");
        exit();
        
    }
    else{
        echo "<script>alert('Nomor Hp Tidak Terdaftar!!'); window.location.href = 'lupapass.php';</script>";
        exit();
    }


        
}
?>