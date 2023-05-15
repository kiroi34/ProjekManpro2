<?php
include 'koneksi.php';

$nama = $_POST['fname'];
$jk = $_POST['jenisKelamin'];
$umur = $_POST['umur'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$nomorTelpon = $_POST['nomorTelpon'];
$email = $_POST['email'];
$pass = $_POST['password'];
$c_pass = $_POST['cpassword'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];


if ( $pass != $c_pass) {
    echo "<script>alert('PASSWORD HARUS SAMA'); window.location.href = 'register.php';</script>";
}else {
    if (isset($_POST['daftar'])) { 
        mysqli_query($sambung, "INSERT INTO akunjemaat ( `namaLengkap`, `jenisKelamin`, `tanggalLahir`, `tempatLahir`, `umur`, `nomorTelepon`, `email`, `password`, `kota`, `alamatDomisili`) 
        VALUES ('$nama','$jk','$tanggalLahir','$tempatLahir','$umur','$nomorTelpon','$email',MD5('$pass'),'$kota','$alamat')");
        echo "<script>alert('Pendaftaran Akun Berhasil, Silahkan Login'); window.location.href = 'keluar.php';</script>";
    } else {
        echo "<script>alert('Gagal mendaftar!'); window.location.href = 'register.php';</script>";
    }
}




?>