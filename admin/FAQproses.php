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
            $pertanyaan = $_POST['pertanyaan'];
            $jawaban = $_POST['jawaban'];
        ?>

        <?php
            if ($pertanyaan == '' || $jawaban == '') {
                echo '<h3>Input FAQ gagal</h3>';
                if ($pertanyaan == ''){
                    echo 'Kategori invalid <br>';
                }

                if ($jawaban == '') {
                    echo 'Judul invalid <br>';
                }

                echo '<br><br><h3>Silahkan mengulangi input</h3>';
                echo '<a href="inputFAQ.php"><h3>Back</h3></a>';

            } else {
                $query = "INSERT INTO faq (pertanyaan, jawaban, idgereja) VALUES ('". $pertanyaan."', '". $jawaban ."', ".$_SESSION['gereja'].")";
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