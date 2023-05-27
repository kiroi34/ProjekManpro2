<?php
    require_once "../koneksi.php";
    $id = $_POST['id'];
    $sql = 'SELECT * FROM gereja WHERE idgereja = '.$id;
    $stmt = $sambung->query($sql);
    foreach ($stmt as $data) {
        $isi = '<b>Admin saat ini: </b>';

        $sql2 = 'SELECT * FROM `admin` WHERE idgereja = '.$id;
        $stmt2 = $sambung->query($sql2);
      while($data2 = mysqli_fetch_array($stmt2))
        {
            $isi .= '<br><p>'.$data2['username'].'</p>';
        }
        $isi .= '<br><span onclick="detailadminPage(`'.$id.'`)"><u>Klik Disini untuk Kelola Admin</u></span>';
    }
    echo $isi;
?>