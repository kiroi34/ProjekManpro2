<?php
  require_once 'koneksi.php';

  session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            require_once 'koneksi.php';
            
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $jamoperasional = $_POST['jamoperasional'];
            $kota = $_POST['kota'];
            $alamat = $_POST['alamat'];
            $tentang = $_POST['tentang'];
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];
            $linkgereja = $_POST['linkgereja'];
            $informasipendeta = $_POST['informasipendeta'];
            $rekeningpersembahan = $_POST['rekeningpersembahan'];
            $namacp = $_POST['namacp'];
            $kontakcp = $_POST['kontakcp'];
            $nikcp = $_POST['nikcp'];

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
            }
        ?>

        <div class="container" style="text-align: center; margin-top: 3%;">
            <?php
            move_uploaded_file($tmp_file1, $imgStorePath1);
            move_uploaded_file($tmp_file2, $imgStorePath2);
            move_uploaded_file($tmp_file3, $imgStorePath3);


            $query = "INSERT INTO `gereja`(`nama`, `link`, `namapenanggung`, `nikpenanggung`, `alamat`, `nohp`, `ktppenanggung`, `visi`, `misi`, `waktudaftar`, `waktukonfirmasi`, `konfirmasi`, `email`, `jamoperasional`, `kota`, `tentang`, `informasipendeta`, `rekeningpersembahan`, `fotopersembahan`, `fotogereja`, `fotopendeta`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]')";
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