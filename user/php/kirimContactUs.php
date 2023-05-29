<?php
    require_once "../../admin/Other/functions.php";
    require_once "../koneksi.php";
    session_start();
    $sql = "SELECT * FROM gereja WHERE idgereja = ".$_SESSION['gereja'];
    $stmt = $sambung->query($sql);
    foreach ($stmt as $data) {
        $emailGereja = $data['email'];
    }
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subject = $_POST['judul'];
    $isi = $_POST['isi'];
    $body= '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
                <title>Email Dari Jemaat</title>
            </head>
            <body style="color:black">
                <strong>Nama: '.$nama.',</strong><br>
                <strong>Email: '.$email.',</strong><br>
                <p style="margin-top:15px">'.$isi.'</p>
            </body>
            </html>';
    sendEmail($subject,$body,$emailGereja);
    header("Location: ../ContactUs.php?gereja=".$_SESSION['namagereja']);
?>