<?php
    require_once "../koneksi.php";
    $id = $_POST['id'];
    $sql = 'SELECT * FROM akunjemaat WHERE idAkun = '.$id;
    $stmt = $sambung->query($sql);
    foreach ($stmt as $data) {
        $isi = '<h3> Informasi Jemaat</h3>'
            .'Nama Lengkap: '.$data['namaLengkap']
            .'<br>Jenis Kelamin: ';
        if ($data['jenisKelamin']=='F') {
            $isi .= 'Perempuan';
        } else {
            $isi .= 'Laki-laki'; 
        }
        $isi .= '<br>Nomor Telepon: '.$data['nomorTelepon']
            .'<br>Email: '.$data['email']
            .'<br>Kota: '.$data['kota']
            .'<br>Tanggal Lahir: '.$data['tanggalLahir']
            .'<br>Tempat Lahir: '.$data['tempatLahir']
            .'<br>Usia: '.$data['umur']
            .'<br>Alamat: '.$data['alamatDomisili']
            .'<br>Waktu Daftar: '.$data['waktuDaftar'];
    }
    echo $isi;
?>