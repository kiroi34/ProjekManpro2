<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];
    $table = $_POST['table'];
    if ($table!="kesaksianjemaat") {
        $column = "statuspendaftaran";
        $idname = "iddaftar";
    } else {
        $column = "respon";
        $idname = "idkesaksian";
    }
    $sql = "UPDATE ".$table." 
    SET ".$column." = 0 
    WHERE ".$idname." = ".$id;
    $stmt = $sambung->query($sql);
?>