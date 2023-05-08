<?php
require_once "connByAlan.php";
  
  $timesql = "SELECT * FROM jabatan ";
  $timestmt = $pdo->prepare($timesql);
  $timestmt->execute();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Biodata Pendeta</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="fa_icons/css/all.css"> 
     <link rel="stylesheet" href="css/biodataPendeta.css"> 
     <link rel="stylesheet" href="css/bootstrap.css"> 
     
     <style>
     </style>
      <?
      include 'conn.php'
      ?>
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
          <a href="biodataPendeta.php" class="active">
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
          <a href="#">
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
        <span class="dashboard">Biodata Pendeta</span>
      </div>
      <div class="profile-details">
        <span class="admin_name">Nama Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <div class="box-topic"><a href="#" onclick="showInput()" style="color: #080710;">Input Biodata Pendeta Baru</a></div>
            <i class='bx bx-right-arrow-alt' href="#"></i>
        </div>
      </div>
      


      <div class="home-content">
        <div class="isi" id="divInput" style="display:none">
          
            <form action="inputPendeta.php" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
              <i class="fas fa-times" onclick="closeInput()" style="font-size:20px;color:red; float: right;"></i> 
              <h2 style="padding-left:2px">Inputkan Data Pendeta Baru</h2>
              <br>
                <label for="jabatan">Jabatan</label>
                <select id="jabatan" name="jabatan" required>
                  <option value="pilihan">--Pilih Jabatan--</option>
                  <?php
                  while ($data = $timestmt->fetch()){
                      echo "<option value='" . $data['idJabatan'] . "'>" . $data['namaJabatan'] . "</option>";
                      }
                  ?>
                </select>

                <label for="nama">Nama Lengkap Pengurus</label>
                <input type="text" id="nama" name="nama" placeholder="Masukan Nama Pengurus..." required>
            
                <label for="biodata">Biodata</label>
                <input type="textarea" id="biodata" name="biodata" placeholder="Biodata Pengurus..." required>

                <br>
                <br>
                
                <label for="foto">Upload Foto</label>
                <br>
                <input type="file" id="foto" name="foto">



                
                <br>
                <br>
                <input type="submit" value="Submit" name="submit">
              </form>
        </div>
</div>
<br>
<Br>
<br>


<!-- coba tarik dari database ke admin page -->
<section class="articles">
<?php
include 'koneksi.php'; // Using database connection file here

$records = mysqli_query($sambung,"select id, jabatan.namaJabatan, nama, biodata, foto from pendeta inner join jabatan on jabatan.idJabatan=pendeta.jabatan"); // fetch data from database harus pakai join buat jabatan
while($data = mysqli_fetch_array($records))
{
?>
    
      <article>
        <div class="article-wrapper" style="margin-left:20px">

          <?php echo "<img src='../admin/foto/" . $data["foto"] . "'>"; ?>
          
          <div class="details">
              <h2><?php echo $data['nama']; ?></h2>
              <h3><?php echo $data['namaJabatan']; ?></h3 >
          </div>
          <p id="info"><?php echo $data['biodata']; ?></p>
          <br>
          <div class="btn-group" style="width:100%">
          <form action="updateBiodataPendeta.php" method="post">
            <input type = "hidden" name ="dapetinID" value="<?php echo $data['id']?>">
            <button class="edit" value="update" name="update" style="width: 45%;" >Edit Biodata</button>
          </form>
     
          <form action="deletePendeta.php" method="post">
            <input type = "hidden" name ="dapetinNama" value="<?php echo $data['nama']?>">
            <button class="edit" value="delete" name="delete" style="width: 45%; background-color: #FF4136;">Delete</button>
          </form>
          </div>
</div>
  
</article>

<?php
}
?>
</section>


<?php mysqli_close($sambung); // Close connection ?>
      
  </section>





  <script>
        function showInput() {
            document.getElementById("divInput").style.display = '';
            }

        function closeInput() {
            document.getElementById("divInput").style.display = 'none';
            }

            function validateForm() {
    let a = document.forms["myForm"]["jabatan"].value;
    let b = document.forms["myForm"]["nama"].value;
    let c = document.forms["myForm"]["biodata"].value;
    let d = document.forms["myForm"]["foto"].value;
 
    if (a == "" || a =="pilihan" ) {
      alert("Jabatan Harus Diisi");
      return false;
    }else if(b == "" ) {
      alert("Nama Harus Diisi");
      return false;
    }else if(c == "") {
      alert("Biodata Harus Diisi");
      return false;
    }else if(d == "") {
      alert("Foto harus diupload");
      return false;
    }
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

