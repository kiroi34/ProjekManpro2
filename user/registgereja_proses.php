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
            $visimisi = $_POST['visimisi'];
            $informasipendeta = $_POST['informasipendeta'];
            $pertanyaanfaq = $_POST['pertanyaanfaq'];
            $jawabanfaq = $_POST['jawabanfaq'];
            $kategoriberita = $_POST['kategoriberita'];
            $judulberita = $_POST['judulberita'];
            $kontenberita = $_POST['kontenberita'];
            $tanggalkonten = $_POST['tanggalkonten'];
            $rekeningpersembahan = $_POST['rekeningpersembahan'];
            $namacp = $_POST['namacp'];
            $kontakcp = $_POST['kontakcp'];
            $nikcp = $_POST['nikcp'];

            if ($_FILES != null){
                $fotopersembahan = $_FILES['fotopersembahan']['name']; //nampung nama
                $extention = pathinfo($fotopersembahan, PATHINFO_EXTENSION);
                $tmp_file = $_FILES['fotopersembahan']['tmp_name']; //nampung directory laptop
                $imgStorePath = "../admin/poster/".$fotopersembahan;
            }
        ?>

        <div class="container" style="text-align: center; margin-top: 3%;">
            <?php
                if ($nama == '' || $email == '' || $jamoperasional == '' || $kota == '' || $alamat == '' || $tentang == '' ||
                $visimisi == '' || $informasipendeta == '' || $pertanyaanfaq == '' || $pertanyaanfaq == '' || $jawabanfaq == '' || $kategoriberita == '' ||
                $judulberita == '' || $kontenberita == '' || $tanggalkonten == '' || $rekeningpersembahan == '' || $namacp == '' || $kontakcp == '' || $nikcp == ''){
                    echo '<i class="fas fa-times-circle fa-7x" style="color: red"></i>';
                    echo '<h3 style="margin-top: 1%;">Post gagal direquest!</h3>';

                    if ($nama == '') {
                        echo 'Nama invalid <br>';
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

                    if ($alamat == '') {
                        echo 'Alamat invalid <br>';
                    }

                    if ($tentang == '') {
                        echo 'Tentang invalid <br>';
                    }

                    if ($visimisi == '') {
                        echo 'Visi Misi invalid <br>';
                    }

                    if ($informasipendeta == '') {
                        echo 'Informasi Pendeta invalid <br>';
                    }

                    if ($pertanyaanfaq == '') {
                        echo 'Pertanyaan FAQ invalid <br>';
                    }

                    if ($jawabanfaq == '') {
                        echo 'Jawaban FAQ invalid <br>';
                    }

                    if ($kategoriberita == '') {
                        echo 'Kategori Berita invalid <br>';
                    }

                    if ($judulberita == '') {
                        echo 'Judul Berita invalid <br>';
                    }

                    if ($kontenberita == '') {
                        echo 'Konten Berita invalid <br>';
                    }

                    if ($tanggalkonten == '') {
                        echo 'Tanggal Konten invalid <br>';
                    }

                    if ($rekeningpersembahan == '') {
                        echo 'Rekening Persembahan invalid <br>';
                    }

                    if ($namacp == '') {
                        echo 'Nama CP invalid <br>';
                    }

                    if ($kontakcp == '') {
                        echo 'Kontak CP invalid <br>';
                    }

                    if ($nikcp == '') {
                        echo 'NIK CP invalid <br>';
                    }

                    echo '<br><br><h6>Silahkan mengulangi input</h6>';
                    echo '<a href="registgereja.php"><h5>Back</h5></a>';
                }
            move_uploaded_file($tmp_file, $imgStorePath);

            $query = "INSERT INTO daftargereja (nama, email, jamoperasional, kota, alamat, tentang, visimisi, informasipendeta, pertanyaanfaq, jawabanfaq, kategoriberita, judulberita, kontenberita, tanggalkonten, rekeningpersembahan, fotopersembahan, namacp, kontakcp, nikcp)
                VALUES ('". $nama."', '". $email."', '". $jamoperasional ."', '". $kota ."', '". $alamat ."', '". $tentang ."', '". $visimisi ."', '". $informasipendeta ."', '". $pertanyaanfaq ."', 
                '". $jawabanfaq ."', '". $kategoriberita ."', '". $judulberita ."', '". $kontenberita ."', '". $tanggalkonten ."', '". $rekeningpersembahan ."', '". $fotopersembahan ."', '". $namacp ."', '". $kontakcp ."', '". $nikcp ."')";
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