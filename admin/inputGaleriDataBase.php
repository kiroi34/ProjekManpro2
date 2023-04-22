
<!-- Masih error -->
<?php
include 'koneksi.php';

$foto = '';

if (isset($_POST['submit'])) { 
    $file = $_FILES['foto'];

    $fileName = $_FILES['foto']['name'];
    $fileTempName = $_FILES['foto']['tmp_name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $fileType = $_FILES['foto']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExt));

    $allowTypes = array('jpg', 'jpeg', 'png');
    
    if (in_array($fileExtension, $allowTypes)) {
        if($fileError === 0 ){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".". $fileExtension;
                $fileDestination = 'gambarGaleri/'. $fileNameNew;
                move_uploaded_file($fileTempName, $fileDestination);
                mysqli_query($sambung, "INSERT INTO galeri VALUES ('','$fileNameNew')");
                echo "<script>alert('Input User Baru berhasil'); window.location.href = 'inputGaleri.php';</script>";
            }else {
                echo "<script>alert('Pendaftaran Gagal Karena File Gambar Terlalu Besar '); window.location.href = 'inputGaleri.php';</script>";
            }
        }else{
            echo "Error saat mengupload file !!!";
        }
    }else {
        echo "<script>alert('Format File Tidak Sesuai, Hanya Boleh JPG,JPEG,PNG '); window.location.href = 'inputGaleri.php';</script>";
    }

} else {
    echo "<script>alert('Gagal Input!'); window.location.href = 'inputGaleri.php';</script>";
}




?>