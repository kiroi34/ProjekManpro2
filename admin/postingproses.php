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
                $gambarr = $_FILES['photo']['name'];
                $tmp_file = $_FILES['photo']['tmp_name'];
                $imgStorePath = "img/".$gambarr;
            }
        ?>

        <?php
            if ($kategori == '' || $judul == '' || $konten == '' || $tanggal == 00-00-0000 || $_FILES == null) {
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
                move_uploaded_file($tmp_file, $imgStorePath);
                $query = "INSERT INTO berita (kategori, judul, konten, tanggal, gambar)
                    VALUES ('". $kategori."', '". $judul."', '". $konten ."', '". $tanggal ."', '" . $gambar . "')";
                $sambung->query($query);

                echo '<p>HORE BERHASIL</p>';
            }
        ?>
    </body>
</html>
