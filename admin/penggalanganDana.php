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
        <form id="formulir" action="penggalanganProses.php" enctype="multipart/form-data" method="post">
                <h1>Input Penggalangan Dana Baru</h1>
                <br>
                <label for="exampleFormControlInput1">Judul</label>
                <input type="text" id="judul" class="form-control" name="judul" placeholder="Judul Penggalangan..">
            
                <label for="exampleFormControlInput1">Deskripsi</label>
                <input type="textarea" id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi Penggalangan Dana..">

                <label for="exampleFormControlInput1">Deadline Donasi</label>
                <input type="date" id="deadline" class="form-control" name="deadline">

                <label for="exampleFormControlInput1">Target Donasi</label>
                <input type="number" id="target" class="form-control" name="target" placeholder="Target Penggalangan Dana..">

                <br>
                <br>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Upload Poster Kegiatan</label>
                    <input type="file" id ="poster" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" name="poster" default = 0>
                </div>

                <br>
                <br>
                <input type="submit" value="Submit"></input>
              </form>
        </div>
    </div>
    
    <h3 style="padding-left: 10px;">Penggalangan yang sedang berjalan</h3>
    <div class="row">
    <?php
        $query = "SELECT * FROM inputpenggalangandana";
        $result = $sambung->query($query);

        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()){
                $id=$row['id'];
                echo "ID: " . $row["id"];
                echo "<br>";
                echo "Judul: " . $row["judul"];
                echo "<br>";
                echo "Deskripsi: " . $row["deskripsi"];
                echo "<br>";
                echo "Deadline: " . $row["deadline"];
                echo "<br>";
                echo "Target: " . $row["target"];
                echo "<br>";
                echo "<img src='../admin/poster/" . $row["poster"] . "'>";
                echo "<br>";
            }
        }
    ?>
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

