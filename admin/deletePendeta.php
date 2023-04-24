<?php
include 'koneksi.php';

if (isset($_POST['delete'])) {
    $nama = $_POST['dapetinNama'];
    $query = "DELETE FROM pendeta WHERE nama = '$nama'";
    $query_run = mysqli_query($sambung,$query);

    if($query_run){
         echo "<script>alert('Penghapusan data telah berhasil!!'); window.location.href = 'biodataPendeta.php';</script>";
    }else{
        echo "<script>alert('Penghapusan data gagal !! '); window.location.href = 'biodataPendeta.php';</script>";
    }
}

?>