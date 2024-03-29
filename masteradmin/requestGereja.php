<?php
    require_once 'koneksi.php';
    session_start();
    if(!isset($_SESSION['username'])){
      header("location: loginMaster.php");
      exit;
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Request Gereja</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/kelolaKegiatan.css"> 
     <link rel="stylesheet" href="fa_icons/css/all.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
         $(document).ready(function() {
            var table = $('#example').DataTable( {
            dom: "B<'row'<'col-sm-6'l><'col-sm-6'f>>tipr",
                buttons: [
                'copy','csv','excel'
                ],
                buttons: {
                dom: {
                    button:{
                    tag: "button",
                    className: "btn btn-outline-dark mb-3 mx-1 rounded p-2"
                    },
                    buttonLiner: {
                    tag: null
                    }
                }
                },
            } );
            $('select').on('change', function() {
            });
        });

        function terima(id) {
          Swal.fire({
            title: 'Apakah Anda yakin ingin menerima pendaftaran gereja ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/konfirmasi.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                  document.getElementById('status'+id).innerHTML = '<i style="color:green"> Pendaftaran Diterima</i>';
                  document.getElementById('waktu'+id).innerHTML = result;
                  document.getElementById('btnn'+id).innerHTML = '<button type="button" class="btn btn-danger" onclick="batal('+id+')">Batal</button>';
                }  
              });
            }
          })
        }

      function tolak(id) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menolak pendaftaran gereja ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/tolak.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                  document.getElementById('status'+id).innerHTML = '<i style="color:red">Pendaftaran Ditolak</i>';
                  document.getElementById('waktu'+id).innerHTML = "0000-00-00 00:00:00";
                  document.getElementById('btnn'+id).innerHTML = '<button type="button" class="btn btn-danger" onclick="batal('+id+')">Batal</button>';
                }  
              });
            }
          })
      }

      function batal(id) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin membatalkan konfirmasi pendaftaran gereja ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/batal.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                  document.getElementById('status'+id).innerHTML = '<i style="color:blue"> Menunggu Terkonfirmasi</i>';
                  document.getElementById('waktu'+id).innerHTML = "0000-00-00 00:00:00";
                  document.getElementById('btnn'+id).innerHTML = '<span><button type="button" class="btn btn-success" onclick="terima('+id+')">Terima</button>  <button type="button" class="btn btn-danger" onclick="tolak('+id+')">Tolak</button></span>';
                }  
              });
            }
          })
      }
      
      function lihatVisi(idgereja) {
        document.getElementById("judulModal").innerHTML = '<center><h4>Visi dan Misi</h4></center>';
        $.ajax({
            url: 'php/getvisimisi.php',
            type: 'post',
            data: {
                id: idgereja
            },
            success: function(result) {
              document.getElementById("isiModal").innerHTML = result;
              $('#myModal').modal('show');
            }  
        });
      }


      function lihatCP(idgereja) {
        document.getElementById("judulModal").innerHTML = '<center><h4>Penanggungjawab Gereja</h4></center>';
           $.ajax({
            url: 'php/getinfopenanggungjawab.php',
            type: 'post',
            data: {
                id: idgereja
            },
            success: function(result) {
              document.getElementById("isiModal").innerHTML = result;
              $('#myModal').modal('show');
            }  
        });
      }

      function lihatKTP(ktppenanggung) {
                document.getElementById("judulModal").innerHTML = '<center><h4>Lihat KTP</h4></center>';
                document.getElementById("isiModal").innerHTML = '<center><img src="foto/'+ktppenanggung+'" alt="" style=" width:100%" /></center>';
                $('#myModal').modal('show');

      }

      function tutup() {
        $('#myModal').modal('hide');
      }
    </script>
     <style>
        /* Googlefont Poppins CDN Link */
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
            background: #2f5d8c;
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
            margin-top:2px;
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
            margin-top:3px;
            }
            .sidebar .nav-links .log_out{
            position: absolute;
            bottom: 0;
            width: 100%;
            }
            .home-section{
            position: relative;
            background: #d8d8d6;
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
            width: calc(100% / 4 - 15px);
            background: #fff;
            padding: 15px 14px;
            border-radius: 12px;
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
  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Tittle -->
      <div class="modal-header" id="judulModal">
      </div>
      <!-- Modal body -->
      <div class="modal-body" id="isiModal">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="tutup()">Close</button>
      </div>

    </div>
  </div>
</div>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-user'></i>
      <span class="logo_name">Master Admin</span>
    </div>
      <ul class="nav-links" style="margin-left:-32px">
        <!-- <li>
          <a href="homeMaster.php">
            <i class='bx bx-home-alt' ></i>
            <span class="links_name">Home</span>
          </a>
        </li> -->
        <li>
          <a href="requestGereja.php" class="active">
            <i class='bx bx bx-list-ul' ></i>
            <span class="links_name">Request Gereja</span>
          </a>
        </li>
        <li>
          <a href="listGereja.php">
            <i class='bx bx bx-church' ></i>
            <span class="links_name">List Gereja</span>
          </a>
        </li>
        <br>
        <li class="log_out">
          <a href="logout.php">
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
        <span class="dashboard">Request Gereja</span>
      </div>

      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
    <div class="container">
        <br>
        <div class="table-responsive">
        <div style="overflow-x: auto;">
            <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Gereja</th>
                        <th>Alamat</th>
                        <th>Waktu Daftar</th>
                        <th>Status</th>
                        <th>Waktu Konfirmasi</th>
                        <th>Visi Misi Gereja</th>
                        <th>Penanggungjawab</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                        include 'koneksi.php'; // Using database connection file here
                        $count = 0;
                          $sql = 'SELECT * FROM gereja';
                          $stmt = $sambung->query($sql);
                        while($data = mysqli_fetch_array($stmt))
                        { $count = $count + 1;
                  ?>
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['waktudaftar']; ?></td>
                    <td id="status<?php echo $data['idgereja'];?>"><?php if ($data['konfirmasi']==0) { echo '<i onclick="batal('.$data['idgereja'].')"style="color:green">Sudah Terkonfirmasi</i>'; } if ($data['konfirmasi']==1) { echo '<i onclick="batal('.$data['idgereja'].')"style="color:blue">Menunggu Terkonfirmasi</i>'; } if ($data['konfirmasi']==2) { echo '<i style="color:red" onclick="konfirmasi('.$data['idgereja'].')">Konfirmasi Ditolak</i>'; }?></td>
                    <td id="waktu<?php echo $data['idgereja'];?>"><?php echo $data['waktukonfirmasi']; ?></td>
                    <td><button type="button" class="btn btn-info" onclick="lihatVisi('<?php echo $data['idgereja']; ?>')">Lihat</button></td>
                    <td><button type="button" class="btn btn-info" onclick="lihatCP('<?php echo $data['idgereja']; ?>')">Lihat</button></td>
                    <td id="btnn<?php echo $data['idgereja'];?>"><?php if ($data['konfirmasi']==0 || $data['konfirmasi']==2) {echo '<button type="button" class="btn btn-danger" onclick="batal(`'.$data['idgereja'].'`)">Batal</button>' ;} if ($data['konfirmasi']==1) {echo '<span><button type="button" class="btn btn-success" onclick="terima(`'.$data['idgereja'].'`)">Terima</button>  <button type="button" class="btn btn-danger" onclick="tolak(`'.$data['idgereja'].'`)">Tolak</button></span>' ;} ?></td>
                    </tr>
                  <?php
                      }
                  ?>
                  </tbody>
            </table>
        </div>
        </div>
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

