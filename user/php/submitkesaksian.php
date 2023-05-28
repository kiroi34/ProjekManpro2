<?php
    require_once "connect.php";
    $isi = $_POST['isikesaksian'];
    if (isset($_POST['contact'])) {
        $contact = 1;
    } else {
        $contact = 0;
    }
    $sql = "INSERT INTO `kesaksianjemaat`(`iduser`, `isikesaksian`, `bersediadihubungi`, `tanggalsubmit`, `respon`) VALUES (".$_SESSION['user'].",'".$isi."',".$contact.",current_timestamp,0)";
    $stmt = $conn->query($sql);
    header("Location: ../Form.php?status=5");
?>