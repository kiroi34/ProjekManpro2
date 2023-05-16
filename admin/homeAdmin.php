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
    <title>Admin Home</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/homeAdmin.css"> 


     <style>
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
          <a href="homeAdmin.php" class="active">
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
          <a href="penggalanganDana.php">
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
        <span class="dashboard">Home</span>
      </div>

      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Today's Birthday Information</div>
                <p id="nama">Caca</p>
                <p id="nama">Cici</p>
          </div>
        </div>
      </div>

      <h3 style="margin-left: 1%;">Informasi Permohonan Jemaat</h3>

      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Menerima Yesus</div>
            <a href="#"style="color: #080710;">Informasi Detail</a>
            <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Baptisme</div>
            <a href="#"style="color: #080710;">Informasi Detail</a>
            <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Komunitas Sel</div>
            <a href="#"style="color: #080710;">Informasi Detail</a>
            <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Permohonan Doa</div>
            <a href="#"style="color: #080710;">Informasi Detail</a>
            <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Kesaksian Pribadi</div>
            <a href="#"style="color: #080710;">Informasi Detail</a>
            <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Pemberkatan Pernikahan</div>
            <a href="#"style="color: #080710;">Informasi Detail</a>
            <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>

      </div>

      <h3 style="margin-left: 1%;">Pengelolaan Admin</h3>

<div class="overview-boxes">
  <div class="box">
    <div class="right-side">
      <div class="box-topic">List Admin</div>
      <a href="kelolaAdmin.php"style="color: #080710;">Klik disini</a>
      <i class='bx bx-right-arrow-alt' href="#"></i>
    </div>
  </div>

</div>

      <!-- <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Informasi Permohonan Jemaat</div>
                <a href="#"style="color: #080710;">Menerima Yesus</a>
                <i class='bx bx-right-arrow-alt' href="#"></i>
                <br>
                <a href="#"style="color: #080710;">Baptisme</a>
                <i class='bx bx-right-arrow-alt' href="#"></i>
                <br>
                <a href="#"style="color: #080710;">Komunitas Sel</a>
                <i class='bx bx-right-arrow-alt' href="#"></i>
                <br>
                <a href="#"style="color: #080710;">Permohonan Doa</a>
                <i class='bx bx-right-arrow-alt' href="#"></i>
                <br>
                <a href="#"style="color: #080710;">Kesaksian Pribadi</a>
                <i class='bx bx-right-arrow-alt' href="#"></i>
                <br>
                <a href="#"style="color: #080710;">Pemberkatan Pernikahan</a>
                <i class='bx bx-right-arrow-alt' href="#"></i>
          </div>
        </div>
      </div> -->

      </div>
    </div>
  </section>

  <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
 </script>
</body>
</html>

