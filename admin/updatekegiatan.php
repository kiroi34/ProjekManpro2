<?php
  require_once 'koneksi.php';

  session_start();

  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $username = $_SESSION['username'];
  $id = $_GET['id'];
  $sql = 'SELECT * FROM inputkegiatan WHERE id = '.$id;
  $stmt = $sambung->query($sql);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Kelola Kegiatan</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/inputKegiatan.css"> 
    <script>
        function isi() {
            <?php foreach ($stmt as $res) { ?>
                document.getElementById('nama').value = '<?php echo $res['nama']?>'; 
                document.getElementById('tanggal').value = '<?php echo $res['tanggal']?>'; 
                document.getElementById('deskripsi').value = '<?php echo $res['deskripsi']?>';
            <?php } ?>
        }
    </script>
     <style>

     </style>
   </head>

<body onload="isi()">
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
          <a href="kelolaKegiatan.php" class="active">
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
        <span class="dashboard">Kelola Kegiatan</span>
      </div>
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
        <p style="padding-left: 10px;"><a href="kelolaKegiatan.php" style="color: #080710;">Kembali</a></p>
        <div class="isi">
            <form action="php/updatedatabasekegiatan.php?id=<?php echo $_GET['id']?>" method="POST" enctype="multipart/form-data">
                <h1>Edit Kegiatan</h1>
                <br>
                <label for="judul">Nama Kegiatan</label>
                <input type="text" id="nama" name="nama" required>

                <label for="tanggal">Tanggal Kegiatan</label>
                <input type="date" id="tanggal" name="tanggal" required>
            
                <label for="deskripsi">Deskripsi Kegiatan</label>
                <input type="textarea" id="deskripsi" name="deskripsi" placeholder="Deskripsi Kegiatan.." required>
                <br>
                <br>
                <label for="poster">Upload Poster Kegiatan</label>
                <br>
                <input type="file" id="poster" name="poster">
                <br>
                <br>
                <input class="submitButton" type="submit" value="Submit">
              </form>
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

