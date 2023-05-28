<?php
    require_once "Other/functions.php";
    require_once "koneksi.php";
    session_start();
    $id = $_POST['id'];
    $sql = ("UPDATE pendaftarankegiatan SET statuspembayaran=2 WHERE idpk = ".$id);
    $stmt = $sambung->query($sql);
    $sql = ("SELECT i.nama namakegiatan, j.namaLengkap namajemaat, biayapendaftaran, email, idkegiatan FROM pendaftarankegiatan p JOIN akunjemaat j ON p.idpeserta = j.idAkun JOIN inputkegiatan i ON p.idkegiatan = i.id WHERE idpk =".$id);
    $stmt = $sambung->query($sql);
    $sql = "SELECT * FROM gereja WHERE idgereja=".$_SESSION['gereja'];
    $nama = $sambung->query($sql);
    foreach ($stmt as $data) {
        $subject = "Kegiatan ".$data['namakegiatan'];
        $body= '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
                    <title>Email Konfirmasi</title>
                </head>
                <body style="color:black">
                    <strong>Syalom '.$data['namajemaat'].',</strong><br>
                    <p style="margin-top:15px">Selamat karena kamu terpilih untuk ikut dalam kegiatan '.$data['namakegiatan'].".";
        if ($data['biayapendaftaran']!=0) {
            $body .= '<br>Segera unggah bukti transfer kamu sebesar '.$data['biayapendaftaran'].' di <a href="http://localhost/Projekmanpro2/user/kalender.php">website resmi kami</a>.';
        }
        $body .= '<br>Terus ikuti update dari kegiatan di website resmi kami. Terima kasih atas keikutsertaannya. Tuhan Yesus memberkati.</p>
                <p style="margin-top:20px; font-family: `Brush Script MT`, cursive; font-size: 24px;">';
        foreach ($nama as $n) {
            $body .= $n['nama'];
        }
        $body .= '</p>
                </body>
                </html>';
        sendEmail($subject,$body,$data['email']);
    }
?>