<?php
    require_once '../koneksi.php';

    session_start();
    $sql = "DELETE FROM jadwalpendeta WHERE idjadwal=".$_POST['id'];
    $stmt = $sambung->query($sql);

    $sql = 'SELECT * FROM jadwalpendeta j JOIN pendeta p ON j.pendeta = p.id';
    $tabel = $sambung->query($sql);
    $isi = '';
    $i = 1; 
    foreach ($tabel as $data) {
    $isi .= '<tr>
      <td>'.$i++.'</td>
      <td>'.$data['tema'].'</td>
      <td>'.$data['tanggal'].'</td>
      <td>'.$data['nama'].'</td>
      <td>'.$data['deskripsi'].'</td>
      <td><button class="buttonKlik" onclick="klikedit('.$data['idjadwal'].')">Edit</button><button class="buttonKlik" onclick="klikhapus('.$data['idjadwal'].')">Hapus</button></td>
  </tr>';
  }
  echo $isi;
?>