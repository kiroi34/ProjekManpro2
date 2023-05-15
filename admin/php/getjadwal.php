<?php
    require_once "../koneksi.php";
    $id = $_POST['id'];
    $sql = 'SELECT * FROM jadwalpendeta WHERE idjadwal = '.$id;
    $stmt = $sambung->query($sql);
    $sql = "SELECT * FROM pendeta";
    $pendeta = $sambung->query($sql);
    $isi = '';
    foreach($stmt as $data) {
        $isi .= '<form action="php/editjadwal.php?id='.$id.'" method="POST" enctype="multipart/form-data">
        <i class="fas fa-times" onclick="tutup()" style="font-size:20px;color:red; float: right;"></i> 
        <h1>Edit Jadwal</h1>
        <br>
        <label for="tema">Tema Ibadah: </label>
        <input type="text" id="tema" name="tema" placeholder="" value="'.$data['tema'].'" required>
        <br>
        <label for="tanggal">Tanggal Ibadah: </label>
        <input type="date" id="tanggal" name="tanggal" value="'.$data['tanggal'].'" required>
        <br>
        <label for="pendeta">Pendeta:</label>
        <select id="pendeta" class="form-control" name="pendeta" style="padding-left:20px;">';
        foreach ($pendeta as $pe) {
            $isi .= '<option value="'.$pe['id'].'"';
            if ($pe['id']==$data['pendeta']) {
                $isi .= ' selected';
            }
            $isi .= '>'.$pe['nama'].'</option>';
        }
        $isi .= '</select>
        <br>
        <label for="deskripsi">Deskripsi: </label>
        <br>
        <textarea type="textarea" rows="4" cols="53" id="deskripsi" name="deskripsi" placeholder="Tambahkan keterangan (tidak wajib)..">'.$data['deskripsi'].'</textarea>
        <br>
        <input class="buttonKlik" type="submit" value="Submit">
      </form>';
        }
    echo $isi;
?>