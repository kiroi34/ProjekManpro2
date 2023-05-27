<?php
    require_once "../koneksi.php";
    $id = $_POST['id'];
    $sql = 'SELECT * FROM gereja WHERE idgereja = '.$id;
    $stmt = $sambung->query($sql);
    foreach ($stmt as $data) {
        $isi = 'Visi : '.$data['visi']
            .= '<br>Misi : '.$data['misi'];
    }
    echo $isi;
?>