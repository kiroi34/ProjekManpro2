<?php
include 'koneksi.php';

if (isset($_POST['delete'])) {
    $nama = $_POST['dapetinNama'];
    $query = "DELETE FROM galeri WHERE file_name = '$nama'";
    $query_run = mysqli_query($sambung,$query);

    if($query_run){
         echo "<script>alert('Penghapusan gambar telah berhasil!!'); window.location.href = 'inputGaleri.php';</script>";
    }else{
        echo "<script>alert('Penghapusan gambar gagal !! '); window.location.href = 'inputGaleri.php';</script>";
    }
}

?>