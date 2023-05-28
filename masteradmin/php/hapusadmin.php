<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "DELETE FROM `admin`
    WHERE id = ".$id;
    $stmt = $sambung->query($sql);
?>