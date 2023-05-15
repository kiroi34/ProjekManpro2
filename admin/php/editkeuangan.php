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
                $sql = "UPDATE keuangankegiatan 
                SET nama='".$nama."', 
                tanggal='".$tanggal."', 
                penanggungjawab='".$penanggung."', 
                jumlah=".$jumlah.", 
                keterangan='".$keterangan."', 
                tipekeuangan=".$tipe.", 
                bukti='".$bukti."' 
                WHERE idkk=".$id;
                $stmt = $sambung->query($sql);
                $cek = False;
            }
        } 
    }
    if ($cek) {
        $sql = "UPDATE keuangankegiatan 
        SET nama='".$nama."', 
        tanggal='".$tanggal."', 
        penanggungjawab='".$penanggung."', 
        jumlah=".$jumlah.", 
        keterangan='".$keterangan."', 
        tipekeuangan=".$tipe."    
        WHERE idkk=".$id;
        $stmt = $sambung->query($sql);
    }
    $sambung->close(); 
    header('location: ../kelolaKeuangan.php?id='.$_GET['idkegiatan']); 
?>