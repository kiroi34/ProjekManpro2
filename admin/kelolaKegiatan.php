<?php
  require_once 'koneksi.php';
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }
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
     <script src="https://kit.fontawesome.com/44f557ccce.js"></script> 
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
      var biaya = '';
      var kuota = '';
      var gender = '';
      var usiamin = '', usiamax = '';
      function movepage(id) {
        location.href = 'updatekegiatan.php?id='+id;
      }
      function deletepage(id) {
        Swal.fire({
          title: 'Apakah Anda yakin ingin menghapus kegiatan ini?',
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: 'Ya',
          denyButtonText: `Tidak`,
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = 'php/deletekegiatan.php?id='+id;
          }
        })
      }
      function detailPage(id) {
        location.href = 'detailkegiatan.php?id='+id;
      }
      function showBiaya() {
          cek = document.getElementById("daftar");
          if (cek.checked) {
            document.getElementById("biayaSp").innerHTML = '<label for="biaya">Biaya: </label>' +
            '<input type="number" id="biaya" name="biaya" min="0" max="100000000" value="'+biaya+'"><br>' +
            '<label for="kuota">Kuota: </label>' +
            '<input type="number" id="kuota" name="kuota" min="0" max="100000" value="'+kuota+'"><br>' +
            '<input type="checkbox" name="gender" value="1" id="genderL" onclick="klikGender(1)"/><label for="gender"> Hanya untuk laki-laki</label><br>' +
            '<input type="checkbox" name="gender" value="2" id="genderP" onclick="klikGender(2)"/><label for="gender"> Hanya untuk perempuan</label><br>' +
            'Khusus usia <input type="number" id="usiamin" style="width:50px" name="usiamin" min="0" max="100" value="'+usiamin+'"> sampai <input type="number" id="usiamax" style="width:50px" name="usiamax" min="0" max="100" value="'+usiamax+'"></label><br>';
            if (gender == 1) {
              document.getElementById("genderL").checked = true;
            } else if (gender == 2) {
              document.getElementById("genderP").checked = true;
            }
          } else {
            biaya = document.getElementById('biaya').value;
            kuota = document.getElementById('kuota').value;
            if (document.getElementById('genderL').checked == true) {
              gender = 1;
            } else if (document.getElementById('genderP').checked == true) {
              gender = 2;
            } else {
              gender = 0;
            }
            usiamin = document.getElementById('usiamin').value;
            usiamax = document.getElementById('usiamax').value;
            document.getElementById("biayaSp").innerHTML = '';
          }
        }
      function ubahFilter(data) {
        $.ajax({
            url: 'php/getdatakegiatan.php',
            type: 'post',
            data: {
                filter: data
            },
            success: function(result) {
                document.getElementById('isi').innerHTML = result;
            }  
        });
      }
      function klikGender(num) {
        if (num == 1) {
          document.getElementById('genderP').checked = false;
        } else {
          document.getElementById('genderL').checked = false;
        }
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

<body onload="ubahFilter('all')">
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

        <div class="home-content" >
        <div class="isi" id="divInput" style="display:none">
            <form action="php/inputKegiatantoDatabase.php" method="POST" enctype="multipart/form-data">
                <i class="fas fa-times" onclick="closeInput()" style="font-size:20px;color:red; float: right;"></i> 
                <h1>Input Kegiatan</h1>
                <br>
                <label for="judul">Nama Kegiatan</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Kegiatan.." required>

                <label for="tanggal">Tanggal Kegiatan</label><br> 
                <input type="date" id="tanggal" name="tanggal" required>
                <br>
                <br>
                <label for="deskripsi">Deskripsi Kegiatan</label>
                <input type="textarea" id="deskripsi" name="deskripsi" placeholder="Deskripsi Kegiatan.." required>
                <br>
                <input type="checkbox" id="daftar" name="daftar" value="Pendaftaran" onclick="showBiaya()">
                <label for="daftar">Perlu pendaftaran</label><br>
                <div id="biayaSp" style="margin-left:20px"></div>
                <br>
                <label for="poster">Upload Poster Kegiatan</label>
                <br>
                <input type="file" id="poster" name="poster">
                <br>
                <br>
                <input class="submitButton" type="submit" value="Submit">
              </form>
              <br>
        </div>
    </div>
        
        <h3 style="padding-left: 10px;">Daftar Kegiatan</h3>
        <div style="text-align:right; margin-right:20px;">
        <select name="kegiatan" id="kegiatan" style="width:200px;" onchange="ubahFilter(this.value)">
          <option value="all">Seluruh kegiatan</option>
          <option value="active">Kegiatan aktif</option>
          <option value="acts">Kegiatan dengan peserta</option>
        </select>
    </div>
        <br>
        <section class="articles" id="isi">
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

