<?php
    require_once "connect.php";
    $namapria = $_POST['namapria'];
    $nopria = $_POST['nopria'];
    if (isset($_POST['statuspria'])) {
        $statuspria = 1;
    } else {
        $statuspria = 0;
    }
    $namawanita = $_POST['namawanita'];
    $nowanita = $_POST['nowanita'];
    if (isset($_POST['statuswanita'])) {
        $statuswanita = 1;
    } else {
        $statuswanita = 0;
    }
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $sql = "INSERT INTO `daftarpernikahan`(`iduser`, `namapria`, `notelppria`, `statuspria`, `namawanita`, `notelpwanita`, `statuswanita`, `tanggalpemberkatan`, `lokasi`, `tanggaldaftar`, `status`) VALUES (".$_SESSION['user'].",'".$namapria."','".$nopria."',".$statuspria.",'".$namawanita."','".$nowanita."',".$statuswanita.",'".$tanggal."','".$lokasi."',current_timestamp,0)";
    $stmt = $conn->query($sql);
    header("Location: ../Form.php?status=6");
?>