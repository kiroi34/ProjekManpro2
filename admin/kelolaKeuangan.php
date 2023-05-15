<?php
  require_once 'koneksi.php';
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $id = $_GET['id'];
  $namakegiatan = '';
  $sql = 'SELECT * FROM keuangankegiatan WHERE idkegiatan = '.$id;
  $tabel = $sambung->query($sql);
  $sql2 = 'SELECT * FROM inputkegiatan WHERE id = '.$id;
  $stmt2 = $sambung->query($sql2);
  foreach ($stmt2 as $isi) {
    $namakegiatan = $isi['nama'];
  }
  $uangmasuk = 0;
  $sql = 'SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE tipekeuangan=0 AND idkegiatan='.$id;
  $stmt = $sambung->query($sql);
  foreach ($stmt as $uang) {
    if (isset($uang['uang'])) {
      $uangmasuk = $uang['uang'];
    }
  }
  $uangkeluar = 0;
  $sql = 'SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE tipekeuangan=1 AND idkegiatan='.$id;
  $stmt = $sambung->query($sql);
  foreach ($stmt as $uang) {
    if (isset($uang['uang'])) {
      $uangkeluar = $uang['uang'];
    }
  }

  if (isset($_GET['filter'])) {
    if ($_GET['filter']==1) {
        $sql = 'SELECT MIN(tanggal) tanggal FROM keuangankegiatan WHERE idkegiatan = '.$id;
        $min = $sambung->query($sql);
        
        foreach ($min as $date) {
            $datemin = $date['tanggal'];
        }
        $sql = 'SELECT MAX(tanggal) tanggal FROM keuangankegiatan WHERE idkegiatan = '.$id;
        $max = $sambung->query($sql);
        foreach ($max as $date) {
            $datemax = $date['tanggal'];
        }
        $datemin = date_format(date_create($datemin), 'Y-m-1');
        $datemax = date_format(date_create($datemax), 'Y-m-t');
    
        $pemasukan = array();
        $pengeluaran = array();
        while ($datemin <= $datemax) {
            $newmin = date("Y-m-d", strtotime ('+1 month', strtotime ($datemin)));
            $sql = "SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE (tanggal >= '".$datemin."' AND tanggal < '".$newmin."') AND tipekeuangan = 0";
            $total = $sambung->query($sql);
            foreach ($total as $t) {
                $uang = $t['uang'];
            }
            $tgl = date_format(date_create($datemin), 'M Y');
            array_push($pemasukan, array("label"=> "$tgl", "y"=> $uang));
            $sql = "SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE (tanggal >= '".$datemin."' AND tanggal < '".$newmin."') AND tipekeuangan = 1";
            $total = $sambung->query($sql);
            foreach ($total as $t) {
                $uang = $t['uang'];
            }
            array_push($pengeluaran, array("label"=> "$tgl", "y"=> $uang));
            $datemin = $newmin;
        }
    } else {
        $sql = 'SELECT MIN(tanggal) tanggal FROM keuangankegiatan WHERE idkegiatan = '.$id;
        $min = $sambung->query($sql);
        
        foreach ($min as $date) {
            $datemin = $date['tanggal'];
        }
        $sql = 'SELECT MAX(tanggal) tanggal FROM keuangankegiatan WHERE idkegiatan = '.$id;
        $max = $sambung->query($sql);
        foreach ($max as $date) {
            $datemax = $date['tanggal'];
        }
        $datemin = date_format(date_create($datemin), 'Y-1-1');
        $datemax = date_format(date_create($datemax), 'Y-12-31');
    
        $pemasukan = array();
        $pengeluaran = array();
        while ($datemin <= $datemax) {
            $newmin = date("Y-m-d", strtotime ('+1 year', strtotime ($datemin)));
            $sql = "SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE (tanggal >= '".$datemin."' AND tanggal < '".$newmin."') AND tipekeuangan = 0";
            $total = $sambung->query($sql);
            foreach ($total as $t) {
                $uang = $t['uang'];
            }
            $year = date_format(date_create($datemin), 'Y');
            array_push($pemasukan, array("label"=> "$year", "y"=> $uang));
            $sql = "SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE (tanggal >= '".$datemin."' AND tanggal < '".$newmin."') AND tipekeuangan = 1";
            $total = $sambung->query($sql);
            foreach ($total as $t) {
                $uang = $t['uang'];
            }
            array_push($pengeluaran, array("label"=> "$year", "y"=> $uang));
            $datemin = $newmin;
        }
    }
  } else {
    $sql = 'SELECT MIN(tanggal) tanggal FROM keuangankegiatan WHERE idkegiatan = '.$id;
    $min = $sambung->query($sql);
    
    foreach ($min as $date) {
        $datemin = $date['tanggal'];
    }
    $sql = 'SELECT MAX(tanggal) tanggal FROM keuangankegiatan WHERE idkegiatan = '.$id;
    $max = $sambung->query($sql);
    foreach ($max as $date) {
        $datemax = $date['tanggal'];
    }
    $datemin = date('Y-m-d', strtotime('last monday', strtotime($datemin)));
    $datemax = date('Y-m-d', strtotime('this sunday', strtotime($datemax)));

    $pemasukan = array();
    $pengeluaran = array();
    while ($datemin <= $datemax) {
        $newmin = date('Y-m-d', strtotime('+7 day', strtotime($datemin)));
        $sql = "SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE (tanggal >= '".$datemin."' AND tanggal < '".$newmin."') AND tipekeuangan = 0";
        $total = $sambung->query($sql);
        foreach ($total as $t) {
            $uang = $t['uang'];
        }
        array_push($pemasukan, array("label"=> "$datemin", "y"=> $uang));
        $sql = "SELECT SUM(jumlah) uang FROM keuangankegiatan WHERE (tanggal >= '".$datemin."' AND tanggal < '".$newmin."') AND tipekeuangan = 1";
        $total = $sambung->query($sql);
        foreach ($total as $t) {
            $uang = $t['uang'];
        }
        array_push($pengeluaran, array("label"=> "$datemin", "y"=> $uang));
        $datemin = $newmin;
    }
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
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <script>
        var uangmasuk = <?php echo $uangmasuk ?>;
        var uangkeluar = <?php echo $uangkeluar ?>;
        $(document).ready(function() {
            var totaluang = uangmasuk-uangkeluar;
            document.getElementById('masuk').innerHTML = uangmasuk;
            document.getElementById('keluar').innerHTML = uangkeluar;
            document.getElementById('total').innerHTML = totaluang;
            if (totaluang < 0) {
              document.getElementById('total').style.color = 'red';
            } else if (totaluang > 0) {
              document.getElementById('total').style.color = 'green';
            }
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
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                backgroundColor: 'transparent',
                title:{
                    text: "Pemasukan dan Pengeluaran Keuangan"
                },
                axisY:{
                    includeZero: true
                },
                legend:{
                    cursor: "pointer",
                    verticalAlign: "center",
                    horizontalAlign: "right",
                    itemclick: toggleDataSeries
                },
                data: [{
                    type: "column",
                    name: "Pemasukan",
                    indexLabel: "{y}",
                    yValueFormatString: "Rp#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($pemasukan, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "column",
                    name: "Pengeluaran",
                    indexLabel: "{y}",
                    yValueFormatString: "Rp#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($pengeluaran, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            
            function toggleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else{
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        });
        function klikFilter() {
            var filter = document.getElementById('chart').value;
            if (filter=='week') {
                window.location = 'kelolaKeuangan.php?id='+<?php echo $id; ?>;
            } else if (filter=='month') {
                window.location = 'kelolaKeuangan.php?filter=1&id='+<?php echo $id; ?>;
            } else {
                window.location = 'kelolaKeuangan.php?filter=2&id='+<?php echo $id; ?>;
            }
        }
        function tutup() {
            $('#myModal').modal('hide');
        }
        function klikTambah() {
            isi = `<form action="php/inputKeuangan.php?id=`+<?php echo $id ?> +`" method="POST" enctype="multipart/form-data">
                <i class="fas fa-times" onclick="tutup()" style="font-size:20px;color:red; float: right;"></i> 
                <h1>Input Keuangan</h1>
                <br>
                <label for="judul">Nama: </label>
                <input type="text" id="nama" name="nama" placeholder="" required>
                <br>
                <label for="jumlah">jumlah: </label>
                <input type="number" min="0" max="1000000000" id="jumlah" name="jumlah" placeholder="" required>
                <br>
                <label for="tanggal">Tanggal: </label>
                <input type="date" id="tanggal" name="tanggal" required>
                <br>
                <label for="penanggung">Penanggung Jawab: </label>
                <input type="text" id="penanggung" name="penanggung" required>
                <br>
                <label for="tipe">Tipe Keuangan: </label>
                <select name="tipe" id="tipe">
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
                <br>
                <label for="bukti">Upload Bukti: </label>
                <input type="file" id="bukti" name="bukti">
                <br>
                <label for="keterangan">Keterangan: </label>
                <br>
                <textarea type="textarea" rows="4" cols="50" id="keterangan" name="keterangan" placeholder="Tambahkan keterangan (tidak wajib).."></textarea>
                <br>
                <input class="buttonKlik" type="submit" value="Submit">
              </form>`;
              document.getElementById('isiModal').innerHTML = isi;
              $('#myModal').modal('show');
        }
        function lihatbukti(bukti) {
          if (bukti!='-') {
            document.getElementById("isiModal").innerHTML = '<center><img src="foto/'+bukti+'" alt="" style=" width:100%" /></center>';
          } else {
            document.getElementById("isiModal").innerHTML = '<center><i class="fas fa-image" style="font-size:300px;"></i><h5>Belum ada gambar yang diunggah</h5></center>';
          }
          $('#myModal').modal('show');
        }
        function klikedit(id) {
          $.ajax({
            url: 'php/getdatakeuangan.php',
            type: 'post',
            data: {
                idkk: id,
                idkegiatan: <?php echo $id?>
            },
            success: function(result) {
              document.getElementById('isiModal').innerHTML = result;
              $('#myModal').modal('show');
            }  
          });
        }
        function klikhapus(id, jum, tipe) {
          Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data keuangan ini?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ya',
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'php/hapuskeuangan.php',
                type: 'post',
                data: {
                    idkk: id,
                    idkegiatan: <?php echo $id?>
                },
                success: function(result) {
                  if (tipe==0) {
                    uangmasuk -= jum;
                  } else {
                    uangkeluar -= jum;
                  }
                  var totaluang = uangmasuk-uangkeluar;
                  document.getElementById('masuk').innerHTML = uangmasuk;
                  document.getElementById('keluar').innerHTML = uangkeluar;
                  document.getElementById('total').innerHTML = totaluang;
                  if (totaluang < 0) {
                    document.getElementById('total').style.color = 'red';
                  } else if (totaluang > 0) {
                    document.getElementById('total').style.color = 'green';
                  }
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
        .buttonKlik, #chart {
            background-color: transparent; 
            border: 1px solid black; 
            border-radius: 10px;
            padding: 5px 10px;
        }
        .buttonKlik:hover, #chart:hover {
            background-color: black;
            color: white;
        }
        input, label, select{
            border-radius: 10px;
            margin-bottom:5px;
        }
        input {
            border: 1px solid black; 
            padding-left:2px;
        }
        #bukti {
            border: 0px; 
            border-radius: 0px;
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
        <h2><i class="fa fa-chevron-left" onclick="window.location.href='detailKegiatan.php?id=<?php echo $id ?>'"></i> Keuangan <?php echo $namakegiatan ?></h2>
        <button class="buttonKlik" style="margin-top:5px" onclick="klikTambah()">Tambah keuangan baru</button>
        <select name="chart" id="chart" onchange="klikFilter()" style="float:right">
            <option value="week">Mingguan</option>
            <option value="month" <?php if(isset($_GET['filter'])) { if($_GET['filter']==1) { echo 'selected';}}?>>Bulanan</option>
            <option value="year" <?php if(isset($_GET['filter'])) { if($_GET['filter']==2) { echo 'selected';}}?>>Tahunan</option>
        </select>
        <br><br>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <br>
        <div class="table-responsive">
        <div style="overflow-x: auto;">
            <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Penanggung Jawab</th>
                        <th>Tipe</th>
                        <th>Keterangan</th>
                        <th>Bukti</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="isiTabel">
                    <?php $i = 1; 
                      foreach ($tabel as $data) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $data['nama'];?></td>
                        <td><?php echo $data['jumlah'];?></td>
                        <td><?php echo $data['tanggal'];?></td>
                        <td><?php echo $data['penanggungjawab'];?></td>
                        <td style="color:<?php if ($data['tipekeuangan']==0) { echo 'green'; } else { echo 'red'; }?>"><?php if ($data['tipekeuangan']==0) { echo 'Pemasukan'; } else { echo 'Pengeluaran'; }?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td><button class="buttonKlik" onclick="lihatbukti(`<?php echo $data['bukti']?>`)">Lihat</button></td>
                        <td><button class="buttonKlik" onclick="klikedit(<?php echo $data['idkk']?>)">Edit</button><button class="buttonKlik" onclick="klikhapus(<?php echo $data['idkk']?>, `<?php echo $data['jumlah']?>`, <?php echo $data['tipekeuangan']?>)">Hapus</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tbody>
                  <td colspan="7">Total Pemasukan</td>
                  <td colspan="2" id="masuk" style="color:green"></td>
                </tbody>
                <tbody>
                  <td colspan="7">Total Pengeluaran</td>
                  <td colspan="2" id="keluar" style="color:red"></td>
                </tbody>
                <tbody style="font-weight:bold;">
                  <td colspan="7">Total Keseluruhan</td>
                  <td colspan="2" id="total"></td>
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

