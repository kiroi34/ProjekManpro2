<?php
  require_once 'koneksi.php';

  session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            require_once 'koneksi.php';
            
            $id = $_POST['id'];
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
            $fotopersembahan = $_POST['fotopersembahan'];
            $namacp = $_POST['namacp'];
            $kontakcp = $_POST['kontakcp'];
            $nikcp = $_POST['nikcp'];

            if ($_FILES != null) {
                $poster = $_FILES['fotopersembahan']['name']; //nampung nama
                $extention = pathinfo($poster, PATHINFO_EXTENSION);

                if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                    $tmp_file = $_FILES['fotopersembahan']['tmp_name']; //nampung directory laptop
                    $imgStorePath = "poster/".$poster;
                } else {
                    echo "extention tidak sesuai";
                }
            }
            
            if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                    move_uploaded_file($tmp_file, $imgStorePath);

                    $query = "INSERT INTO daftargereja (id, nama, email, jamoeprasional, kota, alamat, tentang, visimisi, informasipendeta, pertanyaanfaq, jawabanfaq, kategoriberita, judulberita, kontenberita, tanggalkonten, rekeningpersembahan, fotopersembahan, namacp, kontakcp, nikcp)
                        VALUES ('". $id."', '". $nama."', '". $email ."', '". $jamoperasional ."', '". $kota ."', '". $alamat ."', '". $tentang ."', '". $visimisi ."', '". $informasipendeta ."', '". $pertanyaanfaq ."', '". $jawabanfaq ."', '". $kategoriberita ."', '". $judulberita ."', '". $kontenberita ."', '". $tanggalkonten ."', '". $rekeningpersembahan ."', '". $fotopersembahan ."', '". $namacp ."', '". $kontakcp ."', '". $nikcp ."')";
                    $sambung->query($query);                    
            } else {
                echo "extention tidak sesuai";
            }
        ?>

        <script>
            alert('Selamat, Data berhasil diupload!');
            window.location.href = document.referrer;
            function clearForm() {
                var form = document.getElementById('formulir');
                form.reset();
            }
            clearForm();
        </script>
    </body>
</html>