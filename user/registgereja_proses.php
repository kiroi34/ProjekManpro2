<?php
  require_once 'koneksi.php';

  session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            $nama = $_POST['nama'];
            $namapenanggung = $_POST['namapenanggung'];
            $nikpenanggung = $_POST['nikpenanggung'];
            $alamat = $_POST['alamat'];
            $nohp = $_POST['nohp'];
            $waktudaftar = $_POST['waktudaftar'];
            $waktukonfirmasi = $_POST['waktukonfirmasi'];
            $konfirmasi = $_POST['konfirmasi'];
            $email = $_POST['email'];
            $jamoperasional = $_POST['jamoperasional'];
            $kota = $_POST['kota'];
            $tentang = $_POST['tentang'];
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];
            $linkgereja = $_POST['linkgereja'];
            $informasipendeta = $_POST['informasipendeta'];
            $rekeningpersembahan = $_POST['rekeningpersembahan'];

            $fotopersembahan = $_FILES['fotopersembahan']['name']; //nampung nama
            $extention = pathinfo($fotopersembahan, PATHINFO_EXTENSION);
            $tmp_file1 = $_FILES['fotopersembahan']['tmp_name']; //nampung directory laptop
            $imgStorePath1= "../admin/poster/".$fotopersembahan;

            if ($_FILES != null){
                $fotopendeta = $_FILES['fotopendeta']['name']; //nampung nama
                $extention = pathinfo($fotopendeta, PATHINFO_EXTENSION);
                $tmp_file1 = $_FILES['fotopendeta']['tmp_name']; //nampung directory laptop
                $imgStorePath1 = "assets/".$fotopendeta;

                $fotoktp = $_FILES['fotoktp']['name']; //nampung nama
                $extention = pathinfo($fotoktp, PATHINFO_EXTENSION);
                $tmp_file2 = $_FILES['fotoktp']['tmp_name']; //nampung directory laptop
                $imgStorePath2 = "assets/".$fotoktp;
                
                $fotopersembahan = $_FILES['fotopersembahan']['name']; //nampung nama
                $extention = pathinfo($fotopersembahan, PATHINFO_EXTENSION);
                $tmp_file3 = $_FILES['fotopersembahan']['tmp_name']; //nampung directory laptop
                $imgStorePath3= "assets/".$fotopersembahan;

                $fotogereja = $_FILES['fotogereja']['name']; //nampung nama
                $extention = pathinfo($fotogereja, PATHINFO_EXTENSION);
                $tmp_file4 = $_FILES['fotogereja']['tmp_name']; //nampung directory laptop
                $imgStorePath4= "assets/".$fotogereja;

            }
        ?>
            <?php
                move_uploaded_file($tmp_file1, $imgStorePath1);
                move_uploaded_file($tmp_file2, $imgStorePath2);
                move_uploaded_file($tmp_file3, $imgStorePath3);
                move_uploaded_file($tmp_file4, $imgStorePath4);

                $query = "INSERT INTO gereja (nama, link, namapenanggung, nikpenanggung, alamat, nohp, 
                ktppenanggung, visi, misi, email, jamoperasional, kota, 
                tentang, informasipendeta, rekeningpersembahan, fotopersembahan, fotogereja, fotopendeta)
                    VALUES ('". $nama."', '". $link."''". $namapenanggung."', '". $nikpenanggung ."', '". $alamat ."', '". $nohp ."', 
                    '". $ktppenannggung ."', '". $visi ."', '". $misi ."', '". $email ."', '". $jamoperasional ."', '". $kota ."', 
                    '". $tentang ."', '". $informasipendeta ."', '". $rekeningpersembahan ."', '". $fotopersembahan ."', '". $fotogereja ."', '". $fotopendeta ."')";
                $sambung->query($query);
            ?>

        <script>
            alert('Selamat, Data berhasil diupload!');
            <?php
                header('Location: konfirmasigereja.php');
                exit;
            ?>
        </script>
    </body>
</html>