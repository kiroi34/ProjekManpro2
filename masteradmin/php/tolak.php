<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "UPDATE gereja 
    SET konfirmasi = 2 
    WHERE idgereja = ".$id;
    $stmt = $sambung->query($sql);
?>