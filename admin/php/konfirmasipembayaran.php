<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "UPDATE pendaftarankegiatan 
    SET statuspembayaran = 1, 
    waktukonfirmasi = current_timestamp 
    WHERE idpk = ".$id;
    $stmt = $sambung->query($sql);
    $sql2 = "SELECT waktukonfirmasi FROM pendaftarankegiatan WHERE idpk =".$id; 
    $stmt2 = $sambung->query($sql2);
    $waktu = '';
    foreach ($stmt2 as $data) {
        $waktu = $data['waktukonfirmasi'];
    }
    echo $waktu;
?>