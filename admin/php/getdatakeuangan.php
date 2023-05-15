<?php
    require_once "../koneksi.php";
    $id = $_POST['idkk'];
    $sql = 'SELECT * FROM keuangankegiatan WHERE idkk = '.$id;
    $stmt = $sambung->query($sql);
    $isi = "";
    foreach($stmt as $data) {
    $isi .= '<form action="php/editkeuangan.php?id='.$id.'&idkegiatan='.$_POST['idkegiatan'].'" method="POST" enctype="multipart/form-data">
    <i class="fas fa-times" onclick="tutup()" style="font-size:20px;color:red; float: right;"></i> 
    <h1>Input Keuangan</h1>
    <br>
    <label for="judul">Nama: </label>
    <input type="text" id="nama" name="nama" placeholder="" value="'.$data['nama'].'" required>
    <br>
    <label for="jumlah">jumlah: </label>
    <input type="number" min="0" max="1000000000" id="jumlah" name="jumlah" placeholder="" value="'.$data['jumlah'].'" required>
    <br>
    <label for="tanggal">Tanggal: </label>
    <input type="date" id="tanggal" name="tanggal" value="'.$data['tanggal'].'" required>
    <br>
    <label for="penanggung">Penanggung Jawab: </label>
    <input type="text" id="penanggung" name="penanggung" value="'.$data['penanggungjawab'].'" required>
    <br>
    <label for="tipe">Tipe Keuangan: </label>
    <select name="tipe" id="tipe">
        <option value="Pemasukan"';
    if ($data['tipekeuangan']==0) {
        $isi .= ' selected';
    }   
    $isi .= '>Pemasukan</option>
        <option value="Pengeluaran"';
    if ($data['tipekeuangan']==1) {
        $isi .= ' selected';
    }
    $isi .= '>Pengeluaran</option>
    </select>
    <br>
    <label for="bukti">Upload Bukti: </label>
    <input type="file" id="bukti" name="bukti">
    <br>
    <label for="keterangan">Keterangan: </label>
    <br>
    <textarea type="textarea" rows="4" cols="50" id="keterangan" name="keterangan" placeholder="Tambahkan keterangan (tidak wajib)..">'.$data['keterangan'].'</textarea>
    <br>
    <input class="buttonKlik" type="submit" value="Submit">
  </form>';
    }
    echo $isi;
?>