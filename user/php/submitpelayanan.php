<?php
    require_once "connect.php";
    $kategorisel = $_POST['kategorisel'];
    $pernahikut = $_POST['pernahikut'];
    $kategoripelayanan = $_POST['kategoripelayanan'];
    $statuspernikahan = $_POST['statuspernikahan'];
    $sql = "INSERT INTO `daftarpelayanan`(`iduser`, `kategorisel`, `pernahikut`, `kategoripelayanan`, `statuspernikahan`, `tanggaldaftar`, `statuspendaftaran`) VALUES (".$_SESSION['user'].",".$kategorisel.",'".$pernahikut."',".$kategoripelayanan.",".$statuspernikahan.",current_timestamp,0)";
    $stmt = $conn->query($sql);
    header("Location: ../Form.php?status=1");
?>