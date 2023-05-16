<?php
    require_once "connect.php";

    $id = $_POST['id'];
    $sql = ("SELECT * FROM jadwalpendeta WHERE pendeta = ".$id);
    $stmt = $conn->query($sql);
    $data = $stmt->fetchAll();
    $result = '<div id="demo" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
    $count = 0;
    foreach ($data as $row) {
      $result .= '<div class="carousel-item';
      if ($count==0) {
        $result .= ' active';
      }
      $result .= '"><center><h1><i class="fas fa-calendar-alt"></i> '.$row['tanggal'].'</h1>
      <h2>'.$row['tema'].'</h2>
      <p>'.$row['deskripsi'].'</p></div></center>';
      $count += 1;
    }
    if ($count > 1) {
      $result .= '</div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>';
    }
    if ($count==0) {
      $result="Belum ada jadwal";
    }

    echo $result;
?>