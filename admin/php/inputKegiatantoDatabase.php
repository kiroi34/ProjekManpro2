<?php
    require_once '../koneksi.php';

    session_start();

    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

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
                $sql = "INSERT INTO inputkegiatan (nama, tanggal, deskripsi, poster) 
                VALUES('".$nama."', '".$tanggal."', '".$deskripsi."', '".$fileBasename."')";
                $stmt = $sambung->query($sql);
                $cek = False;
            }
        } 
    }
    if ($cek) {
        $sql = "INSERT INTO inputkegiatan (nama, tanggal, deskripsi, poster) 
        VALUES('".$nama."', '".$tanggal."', '".$deskripsi."', 'defaultKegiatan.png')";
        $stmt = $sambung->query($sql);
    }
    $sambung->close(); 
    header('location: ../kelolaKegiatan.php'); 
?>