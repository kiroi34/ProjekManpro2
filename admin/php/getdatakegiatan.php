<?php
    require_once "../koneksi.php";
    $filter = $_POST['filter'];
    if ($filter == "all") {
        $query = "";
    } elseif ($filter == "active") {
        $query = "WHERE tanggal >= CURRENT_DATE()";
    } else {
        $query = "WHERE pendaftaran = 1";
    }
    $sql = 'SELECT * FROM inputkegiatan '.$query;
    $stmt = $sambung->query($sql);
    $isi = "";
    foreach($stmt as $data) {
    $isi .= '<article>
        <div class="article-wrapper">
            <figure>
            <img src="foto/'.$data['poster'].'" alt="" />
            </figure>
            <div class="article-body">
            <h2>'.$data['nama'].'</h2>
            <p>
                '.$data['deskripsi'].'
            </p><br>
            <center>';
        if ($data['pendaftaran']==1) {
            $isi .= '<button class="button" style="background-color:blue" onclick="detailPage('.$data['id'].')"><span>Lihat detail</span></button><br>';
        }
        $isi .= '<button class="button" onclick="movepage('.$data['id'].')"><span>Edit</span></button><br><button class="button" style="background-color:red" onclick="deletepage('.$data['id'].')"><span>Delete</span></button></center>
            </div>
        </div>
        </article>';
    }
    echo $isi;
?>