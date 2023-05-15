<?php
    require_once '../koneksi.php';

    session_start();

    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $penanggung = $_POST['penanggung'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $id = $_GET['id'];
    if ($_POST['tipe']=='Pemasukan') {
        $tipe=0;
    } else {
        $tipe=1;
    }
    $fileBasename = basename($_FILES['bukti']['name']);
    $fileName = $_FILES['bukti']['name'];
    $fileSize = $_FILES['bukti']['size'];
    $fileTempName = $_FILES['bukti']['tmp_name'];

    $fileError = $_FILES['bukti']['error'];
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
                $sql = "INSERT INTO keuangankegiatan (idkegiatan, nama, penanggungjawab, bukti, tipekeuangan, tanggal, keterangan, jumlah) 
                VALUES(".$id.", '".$nama."', '".$penanggung."', '".$fileBasename."', ".$tipe.", '".$tanggal."', '".$keterangan."', ".$jumlah.")";
                $stmt = $sambung->query($sql);
                $cek = False;
            }
        } 
    }
    if ($cek) {
        $sql = "INSERT INTO keuangankegiatan (idkegiatan, nama, penanggungjawab, bukti, tipekeuangan, tanggal, keterangan, jumlah) 
        VALUES(".$id.", '".$nama."', '".$penanggung."', '-', ".$tipe.", '".$tanggal."', '".$keterangan."', ".$jumlah.")";
        $stmt = $sambung->query($sql);
    }
    $sambung->close(); 
    header('location: ../kelolaKeuangan.php?id='.$id); 
?>