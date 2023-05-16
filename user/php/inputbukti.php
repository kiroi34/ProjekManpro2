<?php
    require_once "connect.php";
    $fileBasename = basename($_FILES['bukti']['name']);
    $fileName = $_FILES['bukti']['name'];
    $fileSize = $_FILES['bukti']['size'];
    $fileTempName = $_FILES['bukti']['tmp_name'];

    $fileError = $_FILES['bukti']['error'];
    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));
    $destination = "../../admin/foto/";

    $targetDir = $destination . $fileBasename;

    $allowTypes = array('jpg', 'jpeg', 'png');
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    if (in_array($fileExtension, $allowTypes)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $upload = move_uploaded_file($fileTempName, $targetDir);
                if (isset($_GET['daftar'])) {
                    $sql = ("UPDATE pendaftarankegiatan SET buktipembayaran = '".$fileBasename."', statuspembayaran=0 WHERE idpk = ".$_GET['daftar']);
                } else {
                    $sql = ("INSERT INTO pendaftarankegiatan(idkegiatan, idpeserta, statuspembayaran, buktipembayaran)
                    VALUES(".$_GET['id'].", ".$_SESSION['user'].", 0, '".$fileBasename."')");
                }
                $stmt = $conn->query($sql);
            }
        } 
    }
    header('location: ../kalender.php?daftar=1'); 
?>