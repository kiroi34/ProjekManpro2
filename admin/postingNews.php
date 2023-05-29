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
    <title>Posting News</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/postingNews.css"> 

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
          <a href="homeAdmin.php">
            <i class='bx bx-home-alt' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="postingNews.php" class="active">
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
        <span class="dashboard">Posting News</span>
      </div>

      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
            <div class="isi">
                <form id="formulir" action="postingproses.php" enctype="multipart/form-data" method="post">
                    <!-- <label for="kategori">Kategori Berita</label>
                    <select id="kategori" class="form-control" name="kategori">
                      <option value="kategori">--Pilih Kategori--</option>
                      <?php
                        $sql = "SELECT * FROM kategoriberita";
                        $result = $sambung->query($sql);

                        if ($result->num_rows > 0) {
                          while($data = $result->fetch_assoc()) {
                            echo "<option value='" . $data['id'] . "'>" . $data['namaKategoriBerita'] . "</option>";
                          }
                        }
                      ?> -->
                    </select>

                    <label for="exampleFormControlInput1">Judul Berita</label>
                    <input type="text" id="judul" class="form-control" name="judul" placeholder="Judul Berita..">

                    <label for="exampleFormControlInput1">Rangkuman Berita</label>
                    <input type="text" id="rangkuman" class="form-control" name="judul" placeholder="Rangkuman Berita..">
                
                    <label for="exampleFormControlInput1">Konten</label>
                    <input type="textarea" id="konten" class="form-control" name="konten" placeholder="Konten Berita..">

                    <!-- <label for="exampleFormControlInput1">Tanggal</label>
                    <input type="date" id="tanggal" class="form-control" name="tanggal"> -->

                    <br>
                    <br>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Upload Gambar</label>
                        <input type="file" id ="gambar" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" name="gambar" default = 0>
                    </div>

                    <br>
                    <br>
                    <input type="submit" value="Submit"></input>
                  </form>
            </div>
    </div>
  </section>

  <script>

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