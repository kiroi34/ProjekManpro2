<?php
    require_once 'koneksi.php';

    session_start();
?>

<div class="row">
    <?php
        $query = "SELECT * FROM berita";
        $result = $sambung->query($query);

        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()){
                $id=$row['id'];
                echo "ID: " . $row["id"];
                echo "<br>";
                echo "Kategori: " . $row["kategori"];
                echo "<br>";
                echo "Judul: " . $row["judul"];
                echo "<br>";
                echo "Konten: " . $row["konten"];
                echo "<br>";
                echo "Tanggal: " . $row["tanggal"];
                echo "<br>";
                echo "<img src='../admin/img/" . $row["gambar"] . "'>";
                echo "<br>";
            }
        }
    ?>
</div>