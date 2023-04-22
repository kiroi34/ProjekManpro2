<?php
    require_once '../koneksi.php';

    session_start();

    $sql = "DELETE FROM inputkegiatan WHERE id=".$_GET['id'];
    $stmt = $sambung->query($sql);

    header('location: ../kelolaKegiatan.php'); 
?>