<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "UPDATE pendaftarankegiatan 
    SET statuspembayaran = 0 
    WHERE idpk = ".$id;
    $stmt = $sambung->query($sql);
?>