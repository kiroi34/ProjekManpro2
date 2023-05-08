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
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $deadline = $_POST['deadline'];
            $target = $_POST['target'];

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
            
            if ($judul == '' || $deskripsi == '' || $deadline == 0000-00-00 || $target == '' || $_FILES == null) {
                echo '<h3>Post gagal</h3>';
                if ($judul == ''){
                    echo 'Judul invalid <br>';
                }

                if ($deskripsi == '') {
                    echo 'Deskripsi invalid <br>';
                }
                
                if ($deadline == 00-00-0000) {
                    echo 'Deadline invalid<br>';
                }

                if ($target == '') {
                    echo 'Target invalid <br>';
                }

                if($_FILES == null) {
                    echo 'File invalid <br>';
                }

                echo '<br><br><h3>Silahkan mengulangi input</h3>';
                echo '<a href="penggalanganDana.php"><h3>Back</h3></a>';

            } else {
                if ($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'PNG' || $extention == 'JPG' || $extention == 'JPEG'){
                    
                    move_uploaded_file($tmp_file, $imgStorePath);
                    $query = "INSERT INTO inputpenggalangandana (judul, deskripsi, deadline, target, poster)
                        VALUES ('". $judul."', '". $deskripsi ."', '". $deadline ."', '". $target ."', '". $poster ."')";
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