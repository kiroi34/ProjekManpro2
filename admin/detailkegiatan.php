<?php
  require_once 'koneksi.php';
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $id = $_GET['id'];
  $namakegiatan = '';
  $kuotakegiatan = 0;
  $jumlahkonfirmasi = 0;
  $sql2 = 'SELECT * FROM inputkegiatan WHERE id = '.$id;
  $stmt2 = $sambung->query($sql2);
  foreach ($stmt2 as $isi) {
    $namakegiatan = $isi['nama'];
    $kuotakegiatan = $isi['kuota'];
  }
  if ($kuotakegiatan==0) {
    $kuotakegiatan = '-';
  }
  $sql3 = 'SELECT COUNT(*) jumlah FROM pendaftarankegiatan WHERE idkegiatan = '.$id.' AND statuspembayaran = 1';
  $stmt3 = $sambung->query($sql3);
  foreach ($stmt3 as $isi) {
    $jumlahkonfirmasi = $isi['jumlah'];
  }
  $sql = 'SELECT * FROM pendaftarankegiatan p JOIN jemaat j ON p.idpeserta = j.iduser WHERE idkegiatan = '.$id;
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
        var jumlah = <?php echo $jumlahkonfirmasi; ?>;
        var kuota = '<?php echo $kuotakegiatan ?>';
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
              if (kuota!='-') {
                if (jumlah>=kuota) {
                  alert('Jumlah konfirmasi sudah mencapai kuota!');
                  return;
                }
              }
              $.ajax({
                url: 'php/konfirmasipembayaran.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                  document.getElementById('K'+id).innerHTML = '<i class="fas fa-check" onclick="batal('+id+')" style="color:green"> Yes</i>';
                  document.getElementById('P'+id).innerHTML = result;
                  jumlah += 1;
                  var isi = `(<span style="`;
                  if (kuota!='-') { 
                    if (jumlah>=kuota) { 
                      isi += 'color:red'; 
                    } else {
                      isi += 'color:green';
                    }
                  } else { 
                    isi += 'color:green'; 
                  }
                  isi += `">`+ jumlah + `</span>/`+ kuota + ")";
                  document.getElementById('kuota').innerHTML = isi;
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
                url: 'php/batalkonfirmasi.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                  document.getElementById('K'+id).innerHTML = '<i class="fas fa-times" style="color:red" onclick="konfirmasi('+id+')"> No</i>';
                  document.getElementById('P'+id).innerHTML = "-";
                  jumlah -= 1;
                  var isi = `(<span style=" `;
                  if (kuota!='-') { 
                    if (jumlah>=kuota) { 
                      isi += 'color:red'; 
                    } else {
                      isi += 'color:green';
                    }
                  } else { 
                    isi += 'color:green'; 
                  }
                  isi += `">`+ jumlah + `</span>/`+ kuota + ")";
                  document.getElementById('kuota').innerHTML = isi;
                }  
              });
            }
          })
      }
      function lihatbukti(bukti) {
        document.getElementById("isiModal").innerHTML = '<center><img src="foto/'+bukti+'" alt="" style=" width:100%" /></center>';
        $('#myModal').modal('show');
      }
      function tutup() {
        $('#myModal').modal('hide');
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
    </script>
     <style>
        .logo_name, .links_name {
            margin-top:3px;
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
<br><br><br>
    <div class="container">
        <br>
        <h2><i class="fa fa-chevron-left" onclick="window.location.href='kelolaKegiatan.php'"></i> Peserta <?php echo $namakegiatan ?></h2>
        <label id="kuota">(<span style="<?php if ($kuotakegiatan!='-') { if ($jumlahkonfirmasi>=$kuotakegiatan) { echo 'color:red'; } else { echo 'color:green'; } } else { echo 'color:green'; }?>"><?php echo $jumlahkonfirmasi?></span>/<?php echo $kuotakegiatan?>)</label>
        <button style="float:right" class="buttonUang" onclick="window.location.href='kelolaKeuangan.php?id=<?php echo $id?>'">Kelola Keuangan</button>
        <br><br>
        <div class="table-responsive">
        <div style="overflow-x: auto;">
            <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peserta</th>
                        <th>Waktu Daftar</th>
                        <th>Konfirmasi</th>
                        <th>Waktu Konfirmasi</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody >
                    <?php $i = 1; 
                    foreach ($stmt as $data) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td onclick="klikName('<?php echo $data['idpeserta']; ?>')" id="tdid"><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['waktudaftar']; ?></td>
                        <td id="K<?php echo $data['idpk'];?>"><?php if ($data['statuspembayaran']==1) { echo '<i class="fas fa-check" onclick="batal('.$data['idpk'].')"style="color:green"> Yes</i>'; } else { echo '<i class="fas fa-times" style="color:red" onclick="konfirmasi('.$data['idpk'].')"> No</i>'; }?></td>
                        <td id="P<?php echo $data['idpk'];?>"><?php if ($data['statuspembayaran']==1) { echo $data['waktukonfirmasi']; } else { echo "-";}?></td>
                        <td><?php if (!empty($data['buktipembayaran'])) { echo '<button type="button" class="btn btn-info" onclick="lihatbukti(`'.$data['buktipembayaran'].'`)">Lihat</button>'; } else { echo "-";}?></td>
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

