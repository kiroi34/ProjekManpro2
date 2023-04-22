<?php
  require_once 'koneksi.php';
  session_start();
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
     <link rel="stylesheet" href="css/kelolaKegiatan.css"> 
     <link rel="stylesheet" href="fa_icons/css/all.css"> 
    <script>
      function movepage(id) {
        location.href = 'updatekegiatan.php?id='+id;
      }
    </script>
     <style>
      input[type=submit] {
  width: 100%;
  background-color: #847d7d;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  }

  input[type=submit]:hover {
  background-color: #9c8c8c;
  }

  .isi {
  background-color: #f2f2f2;
  padding: 20px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 85%;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  }
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  }

  input[type=textarea], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
        <div class="overview-boxes">
            <div class="box">
                <div class="box-topic"><a href="#" onclick="showInput()" style="color: #080710;">Input Kegiatan</a></div>
                <i class='bx bx-right-arrow-alt' href="#"></i>
            </div>
        </div>

        <div class="home-content">
        <div class="isi" id="divInput" style="display:none">
            <form action="php/inputKegiatantoDatabase.php" method="POST" enctype="multipart/form-data">
                <i class="fas fa-times" onclick="closeInput()" style="font-size:20px;color:red; float: right;"></i> 
                <h1>Input Kegiatan</h1>
                <br>
                <label for="judul">Nama Kegiatan</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Kegiatan.." required>

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
        
        <h3 style="padding-left: 10px;">Kegiatan yang sedang berjalan</h3>
        <br>
        <section class="articles">
        <?php
          $sql = 'SELECT * FROM inputkegiatan WHERE tanggal >= CURRENT_DATE()';
          $stmt = $sambung->query($sql);
          foreach($stmt as $data) {
            echo '<article>
            <div class="article-wrapper">
              <figure>
                <img src="foto/'.$data['poster'].'" alt="" />
              </figure>
              <div class="article-body">
                <h2>'.$data['nama'].'</h2>
                <p>
                  '.$data['deskripsi'].'
                </p>
                <button class="button" onclick="movepage('.$data['id'].')"><span>Edit</span></button>
              </div>
            </div>
          </article>';
          }
        ?>
        </section>

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

