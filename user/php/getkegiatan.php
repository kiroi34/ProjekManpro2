<?php
    require_once "connect.php";

    $tanggal = $_POST['tanggal'];
    $sql = ("SELECT * FROM inputkegiatan WHERE tanggal = '".$tanggal."' AND idgereja = ".$_SESSION['gereja']);
    $stmt = $conn->query($sql);
    $data = $stmt->fetchAll();
    $result = '<div id="demo" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
    $count = 0;
    foreach ($data as $row) {
      $result .= '<div class="carousel-item';
      if ($count==0) {
        $result .= ' active';
      }
      $result .= '"><img src="../admin/foto/'.$row['poster'].'" alt="Image"><h3 style="padding-top: 10px">'.$row['nama'].'</h3>'.$row['deskripsi'];
      if ($row['pendaftaran']==1) {
        $result .= '<br><button class="klikDaftar" onclick="klikDaftar('.$row['id'].')">Daftar sekarang</button>';
      }
      $result .= '</div>';
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
      $result="";
    }

    header('Content-type: application/json');
    echo json_encode($result);
?>