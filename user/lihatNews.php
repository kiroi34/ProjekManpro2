<?php
    require_once 'koneksi.php';

    session_start();
?>

<div class="row">
    <?php
        $query = "SELECT * FROM berita";
        $result = $sambung->query($query);

        if ($result->num_rows>0) {
            $id=$row['id'];
            echo "ID " . $row["id"];
            echo "Kategori " . $row["kategori"];
            echo "Judul " . $row["judul"];
            echo "Konten " . $row["konten"];
            echo "Tanggal " . $row["tanggal"];
            echo "Gambar " . $row["gambar"];
        }
    ?>
</div>