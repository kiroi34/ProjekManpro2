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

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
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
          <a href="setting.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
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
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <div class="box-topic"><a href="#" onclick="showInput()" style="color: #080710;">Input Penggalangan Dana Baru</a></div>
            <i class='bx bx-right-arrow-alt' href="#"></i>
        </div>
    </div>
    <div class="home-content">
        <div class="isi" id="divInput" style="display:none">
          <form action="" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
                <i class="fas fa-times" onclick="closeInput()" style="font-size:20px;color:red; float: right;"></i> 
                <h1>Input Penggalangan Dana Baru</h1>
                <br>
                <label for="judul">Judul</label>
                <input type="text" id="nama" name="nama" placeholder="Judul Penggalangan..">
            
                <label for="deskripsi">Deskripsi</label>
                <input type="textarea" id="deskripsi" name="deskripsi" placeholder="Deskripsi Penggalangan Dana..">

                <label for="tanggal">Deadline Donasi</label>
                <input type="date" id="tanggal" name="tanggal">

                <label for="target">Target Donasi</label>
                <input type="number" id="target" name="target" placeholder="Target Penggalangan Dana..">

                <br>
                <br>
                <label for="tanggal">Upload Poster Kegiatan</label>
                <br>
                <input type="file" id="poster" name="poster">
                <br>
                <br>
                <input type="submit" value="Submit">
              </form>
        </div>
    </div>
    
    <h3 style="padding-left: 10px;">Penggalangan yang sedang berjalan</h3>
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
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
 </script>
</body>
</html>

