<?php
include 'koneksi.php';
session_start();

$nama = $_POST['nama'];
$username = $_POST['username'];
$password =  $_POST['password'];
$passwordconf = $_POST['passwordconf'];
$idgereja = $_SESSION['gereja'];

$sqljumlah = 'SELECT COUNT(*) jumlah FROM admin WHERE idgereja = '.$idgereja;
$stmt = $sambung->query($sqljumlah);
foreach ($stmt as $isi) {
  $result = $isi['jumlah'];
}

if ( $password != $passwordconf) {
    echo "<script>alert('PASSWORD HARUS SAMA'); window.location.href = 'kelolaAdmin.php';</script>";
}
else{
    if ($result < 5 ){
        if (isset($_POST['submit'])) { 
            mysqli_query($sambung, "INSERT INTO admin ( `idgereja`, `namaadmin`, `username`, `password`) 
            VALUES ('$idgereja','$nama','$username',MD5('$password'))");
            echo "<script>alert('Berhasil menambahkan admin baru!'); window.location.href = 'kelolaAdmin.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan admin baru!'); window.location.href = 'kelolaAdmin.php';</script>";
        }
    }
    else {
        echo "<script>alert('Jumlah Admin melebihi batas maksimal!'); window.location.href = 'kelolaAdmin.php';</script>";
    }
}
?>