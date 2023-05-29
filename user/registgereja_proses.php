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
            $alamat = $_POST['alamat'];

            $tentang = $_POST['tentang'];
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];
            $linkgereja = $_POST['linkgereja'];

            $informasipendeta = $_POST['informasipendeta'];

            $rekeningpersembahan = $_POST['rekeningpersembahan'];

            $namapenanggung = $_POST['namapenanggung'];
            $nohp = $_POST['nohp'];
            $nikpenanggung = $_POST['nikpenanggung'];

            // $waktudaftar = $_POST['waktudaftar'];
            // $waktukonfirmasi = $_POST['waktukonfirmasi'];
            // $konfirmasi = $_POST['konfirmasi'];

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

                $ktppenanggung = $_FILES['ktppenanggung']['name']; //nampung nama
                $extention = pathinfo($ktppenannggung, PATHINFO_EXTENSION);
                $tmp_file4 = $_FILES['ktppenanggung']['tmp_name']; //nampung directory laptop
                $imgStorePath4 = "../admin/poster/".$ktppenanggung;
            }
        ?>
            <?php
                // if ($nama == '' || $link == '' || $namapenanggung == '' || $nikpenanggung == '' || $alamat == '' || $nohp == '' ||
                // $visi == '' || $misi == '' || $email == '' || $jamoperasional == '' || $kota == '' || $tentang == '' || $informasipendeta == '' ||
                // $rekeningpersembahan == ''){
                //     echo '<i class="fas fa-times-circle fa-7x" style="color: red"></i>';
                //     echo '<h3 style="margin-top: 1%;">Post gagal direquest!</h3>';

                //     if ($nama == '') {
                //         echo 'Nama invalid <br>';
                //     }

                //     if ($link == '') {
                //         echo 'Link invalid <br>';
                //     }
                    
                //     if ($namapenanggung == '') {
                //         echo 'Nama invalid <br>';
                //     }

                //     if ($nikpenanggung == '') {
                //         echo 'NIK invalid <br>';
                //     }

                //     if ($alamat == '') {
                //         echo 'Alamat invalid <br>';
                //     }

                //     if ($nohp == '') {
                //         echo 'No HP invalid <br>';
                //     }

                //     if ($visi == '') {
                //         echo 'Visi invalid <br>';
                //     }

                //     if ($misi == '') {
                //         echo 'Misi invalid <br>';
                //     }

                //     if ($email == '') {
                //         echo 'Email invalid <br>';
                //     }

                //     if ($jamoperasional == '') {
                //         echo 'Jam Operasional invalid <br>';
                //     }

                //     if ($kota == '') {
                //         echo 'Kota invalid <br>';
                //     }

                //     if ($tentang == '') {
                //         echo 'Tentang invalid <br>';
                //     }

                //     if ($informasipendeta == '') {
                //         echo 'Informasi Pendeta invalid <br>';
                //     }

                //     if ($rekeningpersembahan == '') {
                //         echo 'Rekening Persembahan invalid <br>';
                //     }

                //     echo '<br><br><h6>Silahkan mengulangi input</h6>';
                //     echo '<a href="registgereja.php"><h5>Back</h5></a>';
                // }

                move_uploaded_file($tmp_file1, $imgStorePath1);
                move_uploaded_file($tmp_file2, $imgStorePath2);
                move_uploaded_file($tmp_file3, $imgStorePath3);
                move_uploaded_file($tmp_file4, $imgStorePath4);

                $query = "INSERT INTO gereja (nama, link, namapenanggung, nikpenanggung, alamat, nohp, 
                ktppenanggung, visi, misi, email, jamoperasional, kota, 
                tentang, informasipendeta, rekeningpersembahan, fotopersembahan, fotogereja, fotopendeta)
                    VALUES ('". $nama."', '". $link."''". $namapenanggung."', '". $nikpenanggung ."', '". $alamat ."', '". $nohp ."', 
                    '". $ktppenanggung ."', '". $visi ."', '". $misi ."', '". $email ."', '". $jamoperasional ."', '". $kota ."', 
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