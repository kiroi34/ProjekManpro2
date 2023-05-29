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
            $link = $_POST['link'];
            $namapenanggung = $_POST['namapenanggung'];
            $nikpenanggung = $_POST['nikpenanggung'];
            $alamat = $_POST['alamat'];
            $nohp = $_POST['nohp'];
            $visi = $_POST['visi'];
            $misi = $_POST['misi'];
            $waktudaftar = $_POST['waktudaftar'];
            $waktukonfirmasi = $_POST['waktukonfirmasi'];
            $konfirmasi = $_POST['konfirmasi'];
            $email = $_POST['email'];
            $jamoperasional = $_POST['jamoperasional'];
            $kota = $_POST['kota'];
            $tentang = $_POST['tentang'];
            $informasipendeta = $_POST['informasipendeta'];
            $rekeningpersembahan = $_POST['rekeningpersembahan'];

            $fotopersembahan = $_FILES['fotopersembahan']['name']; //nampung nama
            $extention = pathinfo($fotopersembahan, PATHINFO_EXTENSION);
            $tmp_file1 = $_FILES['fotopersembahan']['tmp_name']; //nampung directory laptop
            $imgStorePath1= "../admin/poster/".$fotopersembahan;

            if ($_FILES != null){
                $fotogereja = $_FILES['fotogereja']['name']; //nampung nama
                $extention = pathinfo($fotogereja, PATHINFO_EXTENSION);
                $tmp_file2 = $_FILES['fotogereja']['tmp_name']; //nampung directory laptop
                $imgStorePath2 = "../admin/poster/".$fotogereja;

                $fotopendeta = $_FILES['fotopendeta']['name']; //nampung nama
                $extention = pathinfo($fotopendeta, PATHINFO_EXTENSION);
                $tmp_file3 = $_FILES['fotopendeta']['tmp_name']; //nampung directory laptop
                $imgStorePath3 = "../admin/poster/".$fotopendeta;

                $ktppenannggung = $_FILES['ktppenannggung']['name']; //nampung nama
                $extention = pathinfo($ktppenannggung, PATHINFO_EXTENSION);
                $tmp_file4 = $_FILES['ktppenannggung']['tmp_name']; //nampung directory laptop
                $imgStorePath4 = "../admin/poster/".$ktppenannggung;
            }
        ?>

        <div class="container" style="text-align: center; margin-top: 3%;">
            <?php
                if ($nama == '' || $link == '' || $namapenanggung == '' || $nikpenanggung == '' || $alamat == '' || $nohp == '' ||
                $visi == '' || $misi == '' || $email == '' || $jamoperasional == '' || $kota == '' || $tentang == '' || $informasipendeta == '' ||
                $rekeningpersembahan == ''){
                    echo '<i class="fas fa-times-circle fa-7x" style="color: red"></i>';
                    echo '<h3 style="margin-top: 1%;">Post gagal direquest!</h3>';

                    if ($nama == '') {
                        echo 'Nama invalid <br>';
                    }

                    if ($link == '') {
                        echo 'Link invalid <br>';
                    }
                    
                    if ($namapenanggung == '') {
                        echo 'Nama invalid <br>';
                    }

                    if ($nikpenanggung == '') {
                        echo 'NIK invalid <br>';
                    }

                    if ($alamat == '') {
                        echo 'Alamat invalid <br>';
                    }

                    if ($nohp == '') {
                        echo 'No HP invalid <br>';
                    }

                    if ($visi == '') {
                        echo 'Visi invalid <br>';
                    }

                    if ($misi == '') {
                        echo 'Misi invalid <br>';
                    }

                    if ($email == '') {
                        echo 'Email invalid <br>';
                    }

                    if ($jamoperasional == '') {
                        echo 'Jam Operasional invalid <br>';
                    }

                    if ($kota == '') {
                        echo 'Kota invalid <br>';
                    }

                    if ($tentang == '') {
                        echo 'Tentang invalid <br>';
                    }

                    if ($informasipendeta == '') {
                        echo 'Informasi Pendeta invalid <br>';
                    }

                    if ($rekeningpersembahan == '') {
                        echo 'Rekening Persembahan invalid <br>';
                    }

                    echo '<br><br><h6>Silahkan mengulangi input</h6>';
                    echo '<a href="registgereja.php"><h5>Back</h5></a>';
                }

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
        </div>

        <script>
            alert('Selamat, Data berhasil diupload!');
            <?php
                header('Location: konfirmasigereja.php');
                exit;
            ?>
        </script>
    </body>
</html>