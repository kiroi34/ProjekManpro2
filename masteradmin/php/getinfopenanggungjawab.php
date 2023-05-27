<?php
    require_once "../koneksi.php";
    $id = $_POST['id'];
    $sql = 'SELECT * FROM gereja WHERE idgereja = '.$id;
    $stmt = $sambung->query($sql);
    foreach ($stmt as $data) {
        $isi = 'Nama : '.$data['namapenanggung']
            .= '<br>NIK : '.$data['nikpenanggung']
            .= '<br>No Hp : '.$data['nohp']
            .= '<br><button type="button" class="btn btn-info" onclick="lihatKTP(`'.$data['ktppenanggung'].'`)">Lihat KTP</button>';
    }
    echo $isi;
?>