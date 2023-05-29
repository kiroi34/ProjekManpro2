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
    <title>Admin Home</title>

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
                window.location.href = "historivotebim.php?karya="+this.value;
            });
        });

        function showInput() {
            document.getElementById("divInput").style.display = '';
            }

        function closeInput() {
            document.getElementById("divInput").style.display = 'none';
            }
        
        function validateForm() {
              let a = document.forms["myForm"]["nama"].value;
              let b = document.forms["myForm"]["username"].value;
              let c = document.forms["myForm"]["password"].value;
          
              if (b == "" ) {
                alert("Nama Harus Diisi");
                return false;
              }else if(b == "") {
                alert("Username Harus Diisi");
                return false;
              }else if(c == "") {
                alert("Password Harus Diidi");
                return false;
              }
          }

          function hapus(id) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus admin ini?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Ya',
                denyButtonText: `Tidak`,
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: 'php/hapusadmin.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(result) {
                      location.reload();
                    }  
                  });
                }
              })
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
            margin-top: 50px;
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

            input[type=password], select {
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
      <ul class="nav-links" style="margin-left: -32px;">
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
        <span class="dashboard">Kelola Admin</span>
      </div>

      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <br>
      <a href="homeAdmin.php" style="margin-left: 50px;">Kembali</a>
      <br>

      <div class="overview-boxes">
        <div class="box">
            <div class="box-topic">
              <a href="#" onclick="showInput()" style="color: #080710;">Klik disini untuk Input Admin Baru</a>
              <br><p><i>Catatan: Jumlah admin maksimal 5</i></p>
            </div>
        </div>
        
        <div class="isi" id="divInput" style="display:none">
          <form action="addadmin.php" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
            <i class="fas fa-times" onclick="closeInput()" style="font-size:20px;color:red; float: right;"></i> 
            <h2 style="padding-left:2px">Input Admin Baru</h2>
            <br>
              <label for="nama">Nama</label>
              <input type="text" id="nama" name="nama" placeholder="Masukan Nama..." required>
              <br>
              <label for="biodata">Username</label>
              <input type="textarea" id="username" name="username" placeholder="Masukkan Username..." required>
              <br>
              <label for="pwd">Password:</label>
              <input type="password" id="password" name="password" placeholder="Masukkan Password..." required>
              <br>
              <label for="pwd">Masukkan Ulang Password:</label>
              <input type="password" id="passwordconf" name="passwordconf" placeholder="Masukkan Ulang Password..." required>
              <br>
              <input type="submit" value="Submit" name="submit">
            </form>
          </div>
      
    <div class="container">
        <br>
        <div class="table-responsive">
        <div style="overflow-x: auto;">
            <table id="example" class="table table-striped" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Username Admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                      include 'koneksi.php'; // Using database connection file here
                      $count = 0;
                        $idgereja = $_SESSION['gereja'];
                        $sql =  'SELECT * FROM admin WHERE idgereja = '.$idgereja;
                        $stmt = $sambung->query($sql);
                        $count = 0;
                      while($data = mysqli_fetch_array($stmt))
                      { $count = $count + 1;
                ?>
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['namaadmin']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td id="btnn<?php echo $data['id'];?>"><button type="button" class="btn btn-danger" onclick="hapus('<?php echo $data['id']; ?>')">Hapus</button></td>
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

