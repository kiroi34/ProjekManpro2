<?php
    require_once "connect.php";
    $kategorisel = $_POST['kategorisel'];
    $statuspernikahan = $_POST['statuspernikahan'];
    $sql = "INSERT INTO `daftarcg`(`iduser`, `kategorisel`, `statuspernikahan`, `tanggaldaftar`, `statuspendaftaran`) VALUES (".$_SESSION['user'].",".$kategorisel.",".$statuspernikahan.",current_timestamp,0)";
    $stmt = $conn->query($sql);
    header("Location: ../Form.php?status=3");
?>