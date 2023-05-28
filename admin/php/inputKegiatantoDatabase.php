<?php
    require_once '../koneksi.php';

    session_start();

    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    if (isset($_POST['daftar'])) {
        $daftar = 1;
        if (!empty($_POST['biaya'])) {
            $biaya = $_POST['biaya'];
        } else {
            $biaya = 0;
        }
        if (!empty($_POST['kuota'])) {
            $kuota = $_POST['kuota'];
        } else {
            $kuota = 0;
        }
        if (!empty($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $gender = 0;
        }
        if (!empty($_POST['usiamin'])) {
            $usiamin = $_POST['usiamin'];
        } else {
            $usiamin = 0;
        }
        if (!empty($_POST['usiamax'])) {
            $usiamax = $_POST['usiamax'];
        } else {
            $usiamax = 0;
        }
    } else {
        $daftar = 0;
        $biaya = 0;
        $kuota = 0;
        $gender = 0;
        $usiamin = 0;
        $usiamax = 0;
    }

    $fileBasename = basename($_FILES['poster']['name']);
    $fileName = $_FILES['poster']['name'];
    $fileSize = $_FILES['poster']['size'];
    $fileTempName = $_FILES['poster']['tmp_name'];

    $fileError = $_FILES['poster']['error'];
    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $destination = "../foto/";

    $targetDir = $destination . $fileBasename;

    $allowTypes = array('jpg', 'jpeg', 'png');
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $cek = True;
    if (in_array($fileExtension, $allowTypes)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $upload = move_uploaded_file($fileTempName, $targetDir);
                $sql = "INSERT INTO inputkegiatan (nama, tanggal, deskripsi, poster, pendaftaran, biayapendaftaran, kuota, gender, usiamin, usiamax, idgereja) 
                VALUES('".$nama."', '".$tanggal."', '".$deskripsi."', '".$fileBasename."', ".$daftar.", ".$biaya.", ".$kuota.", ".$gender.", ".$usiamin.", ".$usiamax.", ".$_SESSION['gereja'].")";
                $stmt = $sambung->query($sql);
                $cek = False;
            }
        } 
    }
    if ($cek) {
        $sql = "INSERT INTO inputkegiatan (nama, tanggal, deskripsi, poster, pendaftaran, biayapendaftaran, kuota, gender, usiamin, usiamax, idgereja) 
        VALUES('".$nama."', '".$tanggal."', '".$deskripsi."', 'defaultKegiatan.png', ".$daftar.", ".$biaya.", ".$kuota.", ".$gender.", ".$usiamin.", ".$usiamax.", ".$_SESSION['gereja'].")";
        $stmt = $sambung->query($sql);
    }
    $sambung->close(); 
    header('location: ../kelolaKegiatan.php'); 
?>