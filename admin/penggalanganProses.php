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
            // $id = $_POST['id'];
            $kategori = $_POST['kategori'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $deadline = $_POST['deadline'];
            $target = $_POST['target_penggalangan'];

            if ($_FILES != null) {
                $poster = $_FILES['poster']['name']; //nampung nama
                $extention = pathinfo($poster, PATHINFO_EXTENSION);

                if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                    $tmp_file = $_FILES['poster']['tmp_name']; //nampung directory laptop
                    $imgStorePath = "poster/".$poster;
                } else {
                    echo "extention tidak sesuai";
                }
            }
            
            if ($kategori == '' || $judul == '' || $deskripsi == '' || $_FILES == null) {
                echo '<h3>Post gagal</h3>';
                if ($kategori == ''){
                    echo 'Kategori invalid <br>';
                }

                if ($judul == ''){
                    echo 'Judul invalid <br>';
                }

                if ($deskripsi == '') {
                    echo 'Deskripsi invalid <br>';
                }

                if($_FILES == null) {
                    echo 'File invalid <br>';
                }

                echo '<br><br><h3>Silahkan mengulangi input</h3>';
                echo '<a href="penggalanganDana.php"><h3>Back</h3></a>';

            } else {
                if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                        move_uploaded_file($tmp_file, $imgStorePath);

                        $query = "INSERT INTO inputpenggalangandana (kategori, judul, deskripsi, deadline, target, poster, idgereja)
                            VALUES ('". $kategori."', '". $judul."', '". $deskripsi ."', '". $deadline ."', '". $target ."', '". $poster ."', ".$_SESSION['gereja'].")";
                        $sambung->query($query);                    
                } else {
                    echo "extention tidak sesuai";
                }
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