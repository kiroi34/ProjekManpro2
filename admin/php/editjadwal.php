<?php
    require_once '../koneksi.php';
    
    session_start();

    $id = $_GET['id'];
    $tema = $_POST['tema'];
    $tanggal = $_POST['tanggal'];
    $pendeta = $_POST['pendeta'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "UPDATE jadwalpendeta  
    SET tema='".$tema."', 
    tanggal='".$tanggal."', 
    pendeta=".$pendeta.", 
    deskripsi='".$deskripsi."'  
    WHERE idjadwal=".$id;
    $stmt = $sambung->query($sql);
                
    $sambung->close(); 
    header('location: ../inputJadwal.php'); 
?>