<?php
    require_once '../koneksi.php';

    session_start();

    $nama = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $pendeta = $_POST['pendeta'];
    $konten = $_POST['konten'];
   
    $sql = "INSERT INTO jadwalpendeta (tema, tanggal, pendeta, deskripsi) 
    VALUES('".$nama."', '".$tanggal."', ".$pendeta.", '".$konten."')";
    $stmt = $sambung->query($sql);
    $sambung->close(); 
    header('location: ../inputJadwal.php'); 
?>