<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "DELETE FROM gereja
    WHERE idgereja = ".$id;
    $stmt = $sambung->query($sql);
?>