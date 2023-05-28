<?php
  require_once 'koneksi.php';
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $sql = 'SELECT * FROM daftarpelayanan d JOIN akunjemaat j ON d.iduser=j.idAkun JOIN kategoripelayanan k ON d.kategoripelayanan=k.idkategori WHERE idgereja='.$_SESSION['gereja'];
  $stmt = $sambung->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Daftar Jemaat yang Mendaftar Pelayanan</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
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
            } );
        });
        function konfirmasi(id) {
          Swal.fire({
            title: 'Apakah Anda yakin ingin menkonfirmasi pembayaran ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/konfirmasistatus.php',
                type: 'post',
                data: {
                    id: id,
                    table: 'daftarpelayanan'
                },
                success: function(result) {
                  document.getElementById('K'+id).innerHTML = '<button class="btn btn-primary" onclick="batal('+id+')">Terkonfirmasi</button>';
                }  
              });
            }
          })

        }
      function batal(id) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin membatalkan konfirmasi pembayaran ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/batalkanstatus.php',
                type: 'post',
                data: {
                    id: id,
                    table: 'daftarpelayanan'
                },
                success: function(result) {
                  document.getElementById('K'+id).innerHTML = '<button class="btn btn-warning" onclick="konfirmasi('+id+')">Pending...</button>';
                }  
              });
            }
          })
      }
      function klikName(iduser) {
        $.ajax({
            url: 'php/getuserinfo.php',
            type: 'post',
            data: {
                id: iduser
            },
            success: function(result) {
              document.getElementById("isiModal").innerHTML = result;
              $('#myModal').modal('show');
            }  
        });
      }
      function tutup() {
        $('#myModal').modal('hide');
      }
    </script>
     <style>
        .logo_name, .links_name {
            margin-top:4px;
        }
        #tdid {
          color: #5100ff;
        }
        #tdid:hover {
          color: #a593cc;
          text-decoration: underline;
        }
        .buttonUang {
          background-color: transparent; 
          border: 1px solid black; 
          border-radius: 10px;
          padding: 5px 10px;
        }
        .buttonUang:hover {
          background-color: black;
          color: white;
        }
        #kuota {
          font-size: 30px;
          margin-left:30px;
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
          <a href="homeAdmin.php" class="active">
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
        <span class="dashboard">Home</span>
      </div>
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
<br><br><br>
    <div class="container">
        <br>
        <h2><i class="fa fa-chevron-left" onclick="window.location.href='homeAdmin.php'"></i> Pendaftaran Pelayanan </h2>
        <br><br>
        <div class="table-responsive">
        <div style="overflow-x: auto;">
            <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori Komunitas Sel</th>
                        <th>Pengalaman</th>
                        <th>Kategori Pelayanan</th>
                        <th>Status Pernikahan</th>
                        <th>Tanggal Daftar</th>
                        <th>Status Pendaftaran</th>
                    </tr>
                </thead>
                <tbody >
                    <?php $i = 1; 
                    foreach ($stmt as $data) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td onclick="klikName('<?php echo $data['iduser']; ?>')" id="tdid"><?php echo $data['namaLengkap']; ?></td>
                        <td><?php if($data['kategorisel']==1) {
                            echo "Anak-Anak (TK - SD)"; 
                        } elseif ($data['kategorisel']==2) {
                            echo "Pelajar (SMP - SMA)";
                        } elseif ($data['kategorisel']==3) {
                            echo "Mahasiswa";
                        } elseif ($data['kategorisel']==4) {
                            echo "Keluarga";
                        } ?></td>
                        <td><?php echo $data['pernahikut']?></td>
                        <td><?php echo $data['namakategori']?></td>
                        <td><?php if($data['statuspernikahan']==1) {
                            echo "Belum Menikah"; 
                        } elseif ($data['statuspernikahan']==2) {
                            echo "Menikah";
                        } ?></td>
                        <td><?php echo $data['tanggaldaftar']?></td>
                        <td id="K<?php echo $data['iddaftar'];?>"><?php if ($data['statuspendaftaran']==1) { echo '<button class="btn btn-primary" onclick="batal('.$data['iddaftar'].')">Terkonfirmasi</button>'; } else { echo '<button class="btn btn-warning" onclick="konfirmasi('.$data['iddaftar'].')">Pending...</button>'; }?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
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

