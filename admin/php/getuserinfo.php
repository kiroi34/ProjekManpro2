<?php
    require_once "../koneksi.php";
    $id = $_POST['id'];
    $sql = 'SELECT * FROM jemaat WHERE iduser = '.$id;
    $stmt = $sambung->query($sql);
    foreach ($stmt as $data) {
        $isi = '<h3> Informasi Jemaat</h3>'
            .'Nama: '.$data['nama']
            .'<br>Jenis kelamin: '.$data['jeniskelamin']
            .'<br>Nomor telepon: '.$data['nomortelepon']
            .'<br>Email: '.$data['email']
            .'<br>Kota: '.$data['kota']
            .'<br>Tanggal lahir: '.$data['tanggallahir']
            .'<br>Alamat: '.$data['alamat']
            .'<br>Waktu Daftar: '.$data['waktudaftar'];
    }
    echo $isi;
?>