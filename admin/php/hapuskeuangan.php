<?php
    require_once '../koneksi.php';

    session_start();
    $sql = "DELETE FROM keuangankegiatan WHERE idkk=".$_POST['idkk'];
    $stmt = $sambung->query($sql);

    $sql = 'SELECT * FROM keuangankegiatan WHERE idkegiatan = '.$_POST['idkegiatan'];
    $tabel = $sambung->query($sql);
    $isi = '';
    $i = 1; 
    foreach ($tabel as $data) {
    $isi .= '<tr>
      <td>'.$i++.'</td>
      <td>'.$data['nama'].'</td>
      <td>'.$data['jumlah'].'</td>
      <td>'.$data['tanggal'].'</td>
      <td>'.$data['penanggungjawab'].'</td>
      <td style="color:';
      if ($data['tipekeuangan']==0) {
        $isi .= 'green'; 
      } else { 
        $isi .= 'red'; 
      }
    $isi .= '">';
      if ($data['tipekeuangan']==0) { 
        $isi.= 'Pemasukan'; 
      } else { 
        $isi .= 'Pengeluaran'; 
      }
    $isi .= '</td>
      <td>'.$data['keterangan'].'</td>
      <td><button class="buttonKlik" onclick="lihatbukti(`'.$data['bukti'].'`)">Lihat</button></td>
      <td><button class="buttonKlik" onclick="klikedit('.$data['idkk'].')">Edit</button><button class="buttonKlik" onclick="klikhapus('.$data['idkk'].', `'.$data['jumlah'].'`, '.$data['tipekeuangan'].')">Hapus</button></td>
  </tr>';
  }
  echo $isi;
?>