<?php
    require_once "connect.php";
    $statusbaptis = $_POST['statusbaptis'];
    $sql = "INSERT INTO `daftarbaptis`(`iduser`, `statusbaptis`, `tanggaldaftar`, `statuspendaftaran`) VALUES (".$_SESSION['user'].",".$statusbaptis.",current_timestamp,0)";
    $stmt = $conn->query($sql);
    header("Location: ../Form.php?status=2");
?>