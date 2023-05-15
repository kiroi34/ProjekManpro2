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
<html lang="en" dir="ltr">
  <head>
    <title>Penggalangan Dana</title>

    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fa_icons/css/all.css"> 
    <link rel="stylesheet" href="css/inputPengalangan.css"> 

    <style>
      .overview-boxes .box{
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50%;
      background: #fff;
      padding: 10px 14px;
      border-radius: 12px;
      margin: auto;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      }

      .col-md-4{
          border-radius: 4px;
          background: #fff;
          box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
          transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
          padding: 14px 80px 18px 36px;
          cursor: pointer;
        }
    </style>
  </head>

  <body>
    <div class="sidebar">

      <div class="logo-details">
        <i class='bx bx-user'></i>
        <span class="logo_name">Admin</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="homeAdmin.php">
              <i class='bx bx-home-alt' ></i>
              <span class="links_name">Home</span>
            </a>
          </li>
          <li>
            <a href="postingNews.php">
              <i class='bx bx-news' ></i>
              <span class="links_name">Posting News</span>
            </a>
          </li>
          <li>
            <a href="inputGaleri.php">
              <i class='bx bx-photo-album' ></i>
              <span class="links_name">Input Galeri</span>
            </a>
          </li>
          <li>
            <a href="kelolaKegiatan.php">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="links_name">Kelola Kegiatan</span>
            </a>
          </li>
          <li>
            <a href="inputJadwal.php">
              <i class='bx bx-calendar' ></i>
              <span class="links_name">Input Jadwal</span>
            </a>
          </li>
          <li>
            <a href="biodataPendeta.php">
              <i class='bx bx-face' ></i>
              <span class="links_name">Biodata Pendeta</span>
            </a>
          </li>
          <li>
            <a href="penggalanganDana.php" class="active">
              <i class='bx bx-coin-stack' ></i>
              <span class="links_name">Penggalangan Dana</span>
            </a>
          </li>
          <li>
            <a href="inputFAQ.php">
              <i class='bx bx-pencil' ></i>
              <span class="links_name">Input FAQ</span>
            </a>
          </li>
          <br>
          <li class="log_out">
            <a href="logoutAdmin.php">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Log out</span>
            </a>
          </li>
        </ul>
    </div>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class='bx bx-menu sidebarBtn'></i>
          <span class="dashboard">Penggalangan Dana</span>
        </div>
        <div class="profile-details">
          <span class="admin_name"> <?php echo $_SESSION['username'];?> </span>
          <i class='bx bx-chevron-down' ></i>
        </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
              <div class="box-topic">
                <a href="#" onclick="showInput()" style="color: #080710;">Input Penggalangan Dana Baru</a>
              </div>
              <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
      </div>

      <div class="home-content">
        <div class="isi" id="divInput" style="display:none">
          <form id="formulir" action="penggalanganProses.php" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
            <i class="fas fa-times" onclick="closeInput()" style="font-size:20px;color:red; float: right;"></i> 
            <h1>Input Penggalangan Dana Baru</h1>
            <br>

            <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" onchange="showTargetInput()">
                  <option value="kategori">--Pilih Kategori--</option>
                    <?php
                      $sql = "SELECT * FROM kategori";
                      $result = $sambung->query($sql);

                      if ($result->num_rows > 0) {
                        while($data = $result->fetch_assoc()) {
                          echo "<option value='" . $data['idKategori'] . "'>" . $data['namaKategori'] . "</option>";
                        }
                      }
                    ?>
                </select>

            <label for="judul">Judul</label>
            <input type="text" id="judul" class="form-control" name="judul" placeholder="Judul Penggalangan..">
        
            <label for="deskripsi">Deskripsi</label>
            <input type="textarea" id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi Penggalangan Dana..">

            <div id="target_input" style="display: none;">
              <label for="deadline">Deadline Donasi</label>
              <input type="date" id="deadline" class="form-control" name="deadline">

              <label for="target">Target</label>
              <input type="number" id="target_penggalangan" class="form-control" name="target_penggalangan" placeholder="Target Penggalangan Dana..">
            </div>

            <br>

            <div class="form-group">
              <label for="poster">Upload Poster Kegiatan</label>
              <br>
              <input type="file" id ="poster" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" name="poster" default = 0>
            </div>

            <br>
            <br>
            <input type="submit" name="submit" value="Submit"></input>
          </form>
        </div>
      </div>

      <script>
          function showTargetInput() {
            var kategori = document.getElementById("kategori");
            var target_input = document.getElementById("target_input");

            if (kategori.value == "1") {
              target_input.style.display = "block";
            } else if (kategori.value == "2" || kategori.value == "3") {
              target_input.style.display = "none";
            }
          }
      </script>

      <h3 style="padding-left: 10px;">Penggalangan yang sedang berjalan</h3>
      <div class="container">
        <div class="row">
          <?php
            $kalimatquery = "SELECT id, kategori.namaKategori, judul, deskripsi, deadline, terkumpul, target, poster
                              FROM inputpenggalangandana INNER JOIN kategori
                              ON kategori.idKategori=inputpenggalangandana.kategori";
            // $kalimatquery = "SELECT * FROM inputpenggalangandana";
            $hasilquery = $sambung->query($kalimatquery);

            if ($hasilquery->num_rows>0) {
              while($row = $hasilquery->fetch_assoc()){
                $id=$row['id'];
                echo "<div class='col-md-4 border'>";
                  echo "<div class='text-center'>";
                    echo "<a id=". $row["id"] ."'>
                      <img src='../admin/poster/". $row['poster'] ."' style='max-height: 100%; width: 300px;' class='img-fluid'>
                    </a>";
                  echo "</div>";

                  echo "<h5>". $row['namaKategori']." </h5>";
                  echo "<h4>". $row['judul']." </h4>";
                  echo "<p>". $row['deskripsi']." </p>";

                  if ($row['target'] != 0){
                    echo "<p>Deadline: ". $row['deadline']." </p>";

                    echo "<div class='progress'>";
                      $persentasiDonasi = $row["terkumpul"] / $row["target"] * 100;
                      echo '<div class="progress-bar progress-bar-success" role="progressbar" style="width: ' .$persentasiDonasi .'%" aria-valuenow="' .$persentasiDonasi.'" aria-valuemin="0" aria-valuemax="100"></div>';
                    echo "</div>";

                    echo '<div class="row">';
                      echo '<div class="col">';
                        echo '<p class="text-left">Rp. ' . number_format($row["terkumpul"]) . '</p>';
                      echo '</div>';
                      echo '<div class="col">';
                        echo '<p class="text-right">Rp. ' . number_format($row["target"]) . '</p>';
                      echo '</div>';
                    echo '</div>';

                  } else {
                      echo '<p class="text-left">Terkumpul: Rp. ' . number_format($row["terkumpul"]) . '</p>';
                  }

                echo "</div>";
              }
            }
          ?>
        </div>
      </div>
    </section>

    <script>
          function showInput() {
              document.getElementById("divInput").style.display = '';
              }

          function closeInput() {
              document.getElementById("divInput").style.display = 'none';
              }

          let sidebar = document.querySelector(".sidebar");
          let sidebarBtn = document.querySelector(".sidebarBtn");
          sidebarBtn.onclick = function() {
          sidebar.classList.toggle("active");

          if(sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
          } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
          }
    </script>
  </body>
</html>

