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

           $poster = $_FILES['fotopersembahan']['name']; //nampung nama
            $extention = pathinfo($poster, PATHINFO_EXTENSION);
            $tmp_file = $_FILES['fotopersembahan']['tmp_name']; //nampung directory laptop
            $imgStorePath = "poster/".$poster;
            
            
            move_uploaded_file($tmp_file, $imgStorePath);

            $query = "INSERT INTO daftargereja (nama, email, jamoperasional, kota, alamat, tentang, visimisi, informasipendeta, pertanyaanfaq, jawabanfaq, kategoriberita, judulberita, kontenberita, tanggalkonten, rekeningpersembahan, fotopersembahan, namacp, kontakcp, nikcp)
                VALUES ('". $nama."', '". $email."', '". $jamoperasional ."', '". $kota ."', '". $alamat ."', '". $tentang ."', '". $visimisi ."', '". $informasipendeta ."', '". $pertanyaanfaq ."', 
                '". $jawabanfaq ."', '". $kategoriberita ."', '". $judulberita ."', '". $kontenberita ."', '". $tanggalkonten ."', '". $rekeningpersembahan ."', '". $fotopersembahan ."', '". $namacp ."', '". $kontakcp ."', '". $nikcp ."')";
            $sambung->query($query);
            
        ?>

        <script>
            alert('Selamat, Data berhasil diupload!');
            // window.location.href = document.referrer;
            // function clearForm() {
            //     var form = document.getElementById('formulir');
            //     form.reset();
            // }
            // clearForm();
            header('Location: Homeuser.php');
            exit;
        </script>
    </body>
</html>