<?php
    require_once "connect.php";
    if (!isset($_SESSION['user'])) {
        echo 8;
        return;
    }
    $id = $_POST['id'];
    $sql = ("SELECT * FROM gereja WHERE idgereja = ".$_SESSION['gereja']);
    $stmt = $conn->query($sql);
    $gereja = $stmt->fetch();
    $sql = ("SELECT * FROM inputkegiatan WHERE id = ".$id);
    $stmt = $conn->query($sql);
    $data = $stmt->fetch();
    $sql = ("SELECT * FROM akunjemaat WHERE idAkun = ".$_SESSION['user']);
    $stmt = $conn->query($sql);
    $bio = $stmt->fetch();
    $sql = ("SELECT * FROM pendaftarankegiatan WHERE idkegiatan = ".$id." AND idpeserta=".$_SESSION['user']);
    $stmt = $conn->query($sql);
    $cek = $stmt->fetch();
    if (isset($cek['idpk'])) {
        if ($cek['buktipembayaran']=='-' and $cek['statuspembayaran']==2) {
            $result = '<h5 style="margin-left:20px">Biaya: '.$data['biayapendaftaran'].'</h5>
            <div class="row"><div class="col-5">
            <img src="assets/'.$gereja['fotopersembahan'].'" alt="" width="200" height="200"></img></div>
            <div class="col-7" style="margin-top:50px">'.$gereja['rekeningpersembahan'].'</div></div>
            <form action="php/inputbukti.php?daftar='.$cek['idpk'].'" method="POST" enctype="multipart/form-data">
            <label for="bukti" style="margin-left:85px;">Upload Bukti: </label>
            <input type="file" id="bukti" name="bukti" style="float:right;" required><br><br>
            <input class="buttonKlik" type="submit" style="float:right;">
            </form>';
            echo $result;
            return;
        } else {
            echo 1;
            return;
        }
    }
    $result = '';
    if ($data['gender']!=0) {
        if ($data['gender']==1) {
            if ($bio['jenisKelamin']=='P') {
                echo 3;
                return;
            }
        } else {
            if ($bio['jenisKelamin']=='L') {
                echo 4;
                return;
            }
        }
    }
    $age = intval(date('Y', time() - strtotime($bio['tanggalLahir']))) - 1970;
    if ($data['usiamin']!=0) {
        if ($age<$data['usiamin']) {
            echo 5;
            return;
        }
    }
    if ($data['usiamax']!=0) {
        if ($age>$data['usiamax']) {
            echo 6;
            return;
        }
    }
    $sql = ("SELECT COUNT(*) jumlah FROM pendaftarankegiatan WHERE idkegiatan = ".$id);
    $stmt = $conn->query($sql);
    $count = $stmt->fetch();
    if ($data['kuota']!=0) {
        if ($count['jumlah']>=$data['kuota']) {
            $sql = ("INSERT INTO pendaftarankegiatan(idkegiatan, idpeserta, statuspembayaran, buktipembayaran)
            VALUES(".$id.", ".$_SESSION['user'].", 0, '-')");
            $stmt = $conn->query($sql);
            echo 7;
            return;
        }
    }
    if ($data['biayapendaftaran']!=0) {
        $result = '<h5 style="margin-left:20px">Biaya: '.$data['biayapendaftaran'].'</h5>
        <div class="row"><div class="col-5">
        <img src="assets/QRcode.png" alt="" width="200" height="200"></img></div>
        <div class="col-7" style="margin-top:50px">BCA: 0218956738 (A/N: Hosea Gunawan)<br>
        BNI: 02140998725362 (A/N: Hosea Gunawan)</div></div>
        <form action="php/inputbukti.php?id='.$id.'" method="POST" enctype="multipart/form-data">
        <label for="bukti" style="margin-left:85px;">Upload Bukti: </label>
        <input type="file" id="bukti" name="bukti" style="float:right;" required><br><br>
        <input class="buttonKlik" type="submit" style="float:right;">
        </form>';
    } else {
        $sql = ("INSERT INTO pendaftarankegiatan(idkegiatan, idpeserta, statuspembayaran, buktipembayaran)
        VALUES(".$id.", ".$_SESSION['user'].", 0, '-')");
        $stmt = $conn->query($sql);
        echo 2;
        return;
    }
    echo $result;
?>