<?php
    require_once "connect.php";
    $kategoridoa = $_POST['kategoridoa'];
    $detaildoa = $_POST['detaildoa'];
    if (isset($_POST['contact'])) {
        $contact = 1;
    } else {
        $contact = 0;
    }
    $sql = "INSERT INTO `daftarpokokdoa`(`iduser`, `kategoridoa`, `detaildoa`, `bersediadihubungi`, `tanggaldaftar`, `statuspendaftaran`) VALUES (".$_SESSION['user'].",".$kategoridoa.",'".$detaildoa."',".$contact.",current_timestamp,0)";
    $stmt = $conn->query($sql);
    header("Location: ../Form.php?status=4");
?>