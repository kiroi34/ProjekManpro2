<?php
  require_once 'koneksi.php';

  session_start();

  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            require_once 'koneksi.php';
            $kategori = $_POST['kategori'];
            $judul = $_POST['judul'];
            $konten = $_POST['konten'];
            $tanggal = $_POST['tanggal'];

            if ($_FILES != null) {
                $gambar = $_FILES['gambar']['name']; //nampung nama
                $extention = pathinfo($gambar, PATHINFO_EXTENSION);

                if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                    $tmp_file = $_FILES['gambar']['tmp_name']; //nampung directory laptop
                    $imgStorePath = "img/".$gambar;
                } else {
                    echo "extention tidak sesuai";
                }
            }
        ?>

        <?php
            if ($kategori == '' || $judul == '' || $konten == '' || $tanggal == 0000-00-00 || $_FILES == null) {
                echo '<h3>Post gagal</h3>';
                if ($kategori == ''){
                    echo 'Kategori invalid <br>';
                }

                if ($judul == '') {
                    echo 'Judul invalid <br>';
                }

                if ($konten == '') {
                    echo 'Konten invalid <br>';
                }
                
                if ($tanggal == 00-00-0000) {
                    echo 'Tanggal invalid<br>';
                }

                if($_FILES == null) {
                    echo 'File invalid <br>';
                }

                echo '<br><br><h3>Silahkan mengulangi input</h3>';
                echo '<a href="postingNews.php"><h3>Back</h3></a>';

            } else {
                
                if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                    
                    move_uploaded_file($tmp_file, $imgStorePath);
                    $query = "INSERT INTO berita (kategori, judul, konten, tanggal, gambar, idgereja)
                        VALUES ('". $kategori."', '". $judul ."', '". $konten ."', '". $tanggal ."', '". $gambar ."', ".$_SESSION['gereja'].")";
                    $sambung->query($query);

                    echo "<script>";
                        echo "alert('Selamat, Data berhasil diupload!');";
                        echo "window.location.href = document.referrer;";
                        echo "function clearForm() {";
                        echo "    var form = document.getElementById('formulir');";
                        echo "    form.reset();";
                        echo "}";
                        echo "clearForm();";
                    echo "</script>";
                    
                } else {
                    echo "extention tidak sesuai";
                }
            }
        ?>
        
        <script>
            alert("Selamat, Data berhasil diupload!");
            window.location.href = document.referrer;
            function clearForm() {
                var form = document.getElementById("formulir");
                form.reset();
            }
            clearForm();
        </script>
    </body>
</html>