<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "UPDATE gereja 
    SET konfirmasi = 0, 
    waktukonfirmasi = current_timestamp 
    WHERE idgereja = ".$id;
    $stmt = $sambung->query($sql);
    $sql2 = "SELECT waktukonfirmasi FROM gereja WHERE idgereja =".$id; 
    $stmt2 = $sambung->query($sql2);
    $waktu = '';
    foreach ($stmt2 as $data) {
        $waktu = $data['waktukonfirmasi'];
    }
    echo $waktu;

    $sql2 = "SELECT * FROM gereja WHERE idgereja = ".$id;
    $stmt2 = $sambung->query($sql2);

    $idgereja = $id;

    foreach ($stmt2 as $data) {
    $username = 'admin'.$data['link'];
    $pwdd = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($pwdd);
    $pwdd = substr(implode($pwdd), 0, 10);

    require_once "../Other/functions.php";
    $subject = "Pendaftaran Gereja Telah Diterima!";
    $body= '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
            <title>Konfirmasi Pendaftaran Gereja</title>
            </head>
            <body style="color:black">
                <strong>Selamat, pendaftaran Gereja telah diterima! Anda bisa langsung mengelola website Gereja anda!</strong><br>
                <p style="margin-top:15px">Silahkan login dengan akun: </p>
                <br><p style="margin-top:15px">Username: '.$username.'</p>
                <p style="margin-top:15px">Password: '.$pwdd.'</p>
            </body>
            </html>';
    sendEmail($subject,$body,$data['email']);

    $namapenanggung = $data['namapenanggung'];
    mysqli_query($sambung, "INSERT INTO admin ( `idgereja`, `namaadmin`, `username`, `password`) 
    VALUES ('$idgereja','$namapenanggung','$username',MD5('$pwdd'))");
    }
?>