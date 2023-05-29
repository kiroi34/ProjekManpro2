<?php
    require_once "../koneksi.php";
    session_start();
    $id = $_POST['id'];

    $sql = "UPDATE gereja 
    SET konfirmasi = 2 
    WHERE idgereja = ".$id;
    $stmt = $sambung->query($sql);

    $sql2 = "SELECT * FROM gereja WHERE idgereja = ".$id;
    $stmt2 = $sambung->query($sql2);
    foreach ($stmt2 as $data) {
    require_once "../Other/functions.php";
    $subject = "Konfirmasi Pendaftaran Ditolak!";
    $body= '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
            <title>endaftaran Gereja Ditolak!</title>
            </head>
            <body style="color:black">
                <strong>Mohon maaf, karena berbagai pertimbangan, konfirmasi dari pendaftaran gereja anda ditolak!</strong><br>
            </body>
            </html>';
    sendEmail($subject,$body,$data['email']);
    }
?>