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

        <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
          *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
          }
          .sidebar{
          position: fixed;
          height: 100%;
          width: 240px;
          background: #847d7d;
          transition: all 0.5s ease;
          }
          .sidebar.active{
          width: 60px;
          }
          .sidebar .logo-details{
          height: 80px;
          display: flex;
          align-items: center;
          }
          .sidebar .logo-details i{
          font-size: 28px;
          font-weight: 500;
          color: #fff;
          min-width: 60px;
          text-align: center
          }
          .sidebar .logo-details .logo_name{
          color: #fff;
          font-size: 24px;
          font-weight: 500;
          }
          .sidebar .nav-links{
          margin-top: 10px;
          }
          .sidebar .nav-links li{
          position: relative;
          list-style: none;
          height: 50px;
          }
          .sidebar .nav-links li a{
          height: 100%;
          width: 100%;
          display: flex;
          align-items: center;
          text-decoration: none;
          transition: all 0.4s ease;
          }
          .sidebar .nav-links li a.active{
          background: #081D45;
          }
          .sidebar .nav-links li a:hover{
          background: #081D45;
          }
          .sidebar .nav-links li i{
          min-width: 60px;
          text-align: center;
          font-size: 18px;
          color: #fff;
          }
          .sidebar .nav-links li a .links_name{
          color: #fff;
          font-size: 15px;
          font-weight: 400;
          white-space: nowrap;
          }
          .sidebar .nav-links .log_out{
          position: absolute;
          bottom: 0;
          width: 100%;
          }
          .home-section{
          position: relative;
          background: #EDE9D5;
          min-height: 100vh;
          width: calc(100% - 240px);
          left: 240px;
          transition: all 0.5s ease;
          }
          .sidebar.active ~ .home-section{
          width: calc(100% - 60px);
          left: 60px;
          }
          .home-section nav{
          display: flex;
          justify-content: space-between;
          height: 80px;
          background: #fff;
          display: flex;
          align-items: center;
          position: fixed;
          width: calc(100% - 240px);
          left: 240px;
          z-index: 100;
          padding: 0 20px;
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
          transition: all 0.5s ease;
          }
          .sidebar.active ~ .home-section nav{
          left: 60px;
          width: calc(100% - 60px);
          }
          .home-section nav .sidebar-button{
          display: flex;
          align-items: center;
          font-size: 24px;
          font-weight: 500;
          }
          nav .sidebar-button i{
          font-size: 35px;
          margin-right: 10px;
          }

          .home-section nav .profile-details{
          display: flex;
          align-items: center;
          background: #F5F6FA;
          border: 2px solid #EFEEF1;
          border-radius: 6px;
          height: 50px;
          min-width: 190px;
          padding: 0 15px 0 2px;
          }
          nav .profile-details img{
          height: 40px;
          width: 40px;
          border-radius: 6px;
          object-fit: cover;
          }
          nav .profile-details .admin_name{
          font-size: 15px;
          font-weight: 500;
          color: #333;
          margin: 0 10px;
          white-space: nowrap;
          }
          nav .profile-details i{
          font-size: 25px;
          color: #333;
          }
          .home-section .home-content{
          position: relative;
          padding-top: 104px;
          }
          .home-content .overview-boxes{
          display: flex;
          align-items: center;
          justify-content: space-between;
          flex-wrap: wrap;
          padding: 0 20px;
          margin-bottom: 26px;
          }
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

          .overview-boxes .box-topic{
          font-size: 20px;
          font-weight: 500;
          }
          
          /* Responsive Media Query */
          @media (max-width: 1240px) {
          .sidebar{
              width: 60px;
          }
          .sidebar.active{
              width: 220px;
          }
          .home-section{
              width: calc(100% - 60px);
              left: 60px;
          }
          .sidebar.active ~ .home-section{
              /* width: calc(100% - 220px); */
              overflow: hidden;
              left: 220px;
          }
          .home-section nav{
              width: calc(100% - 60px);
              left: 60px;
          }
          .sidebar.active ~ .home-section nav{
              width: calc(100% - 220px);
              left: 220px;
          }
          }

          @media (max-width: 1000px) {
          .overview-boxes .box{
              width: calc(100% / 2 - 15px);
              margin-bottom: 15px;
          }
          }
          @media (max-width: 700px) {
          nav .sidebar-button .dashboard,
          nav .profile-details .admin_name,
          nav .profile-details i{
              display: none;
          }
          .home-section nav .profile-details{
              height: 50px;
              min-width: 40px;
          }
          
          }
          @media (max-width: 550px) {
          .overview-boxes .box{
              width: 100%;
              margin-bottom: 15px;
          }
          .sidebar.active ~ .home-section nav .profile-details{
              display: none;
          }
          }
          @media (max-width: 400px) {
          .sidebar{
              width: 0;
          }
          .sidebar.active{
              width: 60px;
          }
          .home-section{
              width: 100%;
              left: 0;
          }
          .sidebar.active ~ .home-section{
              left: 60px;
              width: calc(100% - 60px);
          }
          .home-section nav{
              width: 100%;
              left: 0;
          }
          .sidebar.active ~ .home-section nav{
              left: 60px;
              width: calc(100% - 60px);
          }
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
            <div class="box-topic"><a href="inputPenggalangan.php" style="color: #080710;">Input Penggalangan Dana Baru</a></div>
            <i class='bx bx-right-arrow-alt' href="inputPenggalangan.php"></i>
        </div>
    </div>
    
    <h3 style="padding-left: 10px;">Penggalangan yang sedang berjalan</h3>
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
