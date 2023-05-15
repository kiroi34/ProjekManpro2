<?php
  require_once 'koneksi.php';

  session_start();

  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $username = $_SESSION['username'];

  $sql = "SELECT * FROM pendeta";
  $stmt = $sambung->query($sql);
  $sql = "SELECT * FROM jadwalpendeta j JOIN pendeta p ON j.pendeta = p.id";
  $jadwal = $sambung->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Input Jadwal</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/inputJadwal.css"> 
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            });
        });
        function tutup() {
          $('#myModal').modal('hide');
        }
        function klikedit(id) {
          $.ajax({
            url: 'php/getjadwal.php',
            type: 'post',
            data: {
                id: id
            },
            success: function(result) {
              document.getElementById('isiModal').innerHTML = result;
              $('#myModal').modal('show');
            }  
          });
        }
        function klikhapus(id) {
          Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data keuangan ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/hapusjadwal.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                  Swal.fire('Data berhasil dihapus');
                  document.getElementById('isiTabel').innerHTML = result;
                }  
              });
            }
          })
        }
      </script>
     <style>
        .logo_name, .links_name {
            margin-top:3px;
        }
        .buttonKlik {
            background-color: transparent; 
            border: 1px solid black; 
            border-radius: 10px;
            padding: 5px 10px;
        }
        .buttonKlik:hover{
            background-color: black;
            color: white;
        }
        textarea {
          padding-left:20px;
          padding-top:2px;
        }
     </style>
   </head>

<body>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

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
      <span class="logo_name">Admin</span>
    </div>
      <ul class="nav-links" style="margin-left:-32px">
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
          <a href="inputJadwal.php" class="active">
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
        <span class="dashboard">Input Jadwal</span>
      </div>
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
            <div class="isi">
                <form id="formulir" action="php/inputjadwal.php" enctype="multipart/form-data" method="post">

                    <label for="exampleFormControlInput1">Tema Ibadah</label>
                    <input type="text" id="judul" class="form-control" name="judul" placeholder="Tema Ibadah..">

                    <label for="exampleFormControlInput1">Tanggal Ibadah</label>
                    <input type="date" id="tanggal" class="form-control" name="tanggal">

                    <label for="exampleFormControlInput1" style="margin-bottom:5px">Pendeta</label>
                    <select id="pendeta" class="form-control" name="pendeta" style="padding-left:20px;">
                      <?php foreach ($stmt as $data) {
                        echo '<option value="'.$data['id'].'">'.$data['nama'].'</option>';
                      } ?>
                    </select>

                    <label for="exampleFormControlInput1" style="margin-top:10px">Deskripsi Tema Ibadah</label>
                    <input type="textarea" id="konten" class="form-control" name="konten" placeholder="Deskripsi Singkat Tema Ibadah..">
                    <input type="submit" value="Submit"></input>
                  </form>
            </div>
    </div>
    <br><br>
    <div class="container">
    <div class="table-responsive">
        <div style="overflow-x: auto;">
            <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tema</th>
                        <th>Tanggal</th>
                        <th>Pendeta</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="isiTabel">
                  <?php $i = 1;
                  foreach ($jadwal as $data) {
                    echo '<tr>';
                    echo '<td>'.$i++.'</td>';
                    echo '<td>'.$data['tema'].'</td>';
                    echo '<td>'.$data['tanggal'].'</td>';
                    echo '<td>'.$data['nama'].'</td>';
                    echo '<td>'.$data['deskripsi'].'</td>';
                    echo '<td><button class="buttonKlik" onclick="klikedit('.$data['idjadwal'].')">Edit</button><button class="buttonKlik" onclick="klikhapus('.$data['idjadwal'].')">Hapus</button></td>';
                  } ?>
                </tbody>
            </table>
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

