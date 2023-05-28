<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "UPDATE gereja 
    SET konfirmasi = 0, 
    waktukonfirmasi = current_timestamp 
    WHERE idgereja = ".$id;
    $stmt = $sambung->query($sql);
    $sql2 = "SELECT waktukonfirmasi FROM gereja WHERE idgereja =".$id; 
    $stmt2 = $sambung->query($sql2);
    $waktu = '';
    foreach ($stmt2 as $data) {
        $waktu = $data['waktukonfirmasi'];
    }
    echo $waktu;
?>