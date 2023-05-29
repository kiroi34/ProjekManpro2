<?php
require_once "../admin/connByAlan.php";
require_once "koneksi.php";
if (isset($_GET['gereja'])) {
  $sql = "SELECT * FROM gereja WHERE link = '".$_GET['gereja']."'";
  $records = mysqli_query($sambung, $sql);
  while($data = mysqli_fetch_array($records)){
  $_SESSION['gereja'] = $data['idgereja'];
  $_SESSION['namagereja'] = $_GET['gereja'];
  }
} else {
  header("Location: registgereja.php");
}
  $timesql = "SELECT * FROM jabatan ";
  $timestmt = $pdo->prepare($timesql);
  $timestmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
   <title>Pendeta</title>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
     integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-param" content="_csrf">
     <meta name="csrf-token" content="eFnI7r69sRmjJ4WVIYs1pCAeux2VJAtUpBDAhbT2rLNKbZuk8YTQfdFi7e8R2gTFelb3a_RGUxf7fqrgxLH9ig==">
     <link href="https://gmschurch.azureedge.net/gmsbaratlandingpagedata/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/coba.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

     <script>
     function lihatJadwal(id) {
        $.ajax({
            url: 'php/getJadwal.php',
            type: 'post',
            data: {
                id: id
            },
            success: function(result) {
              document.getElementById('isi').innerHTML = result;
            }  
        });
        $('#myModal').modal('show');

      }
      </script>
     <style>

    body{
          font-family: 'Poppins';font-size: 18px;
        }
    .carousel-control-prev-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
    }
    .carousel-control-next-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;

    }

        /* @media (min-width : 768px) {
          #countdownWrapper {
            margin-top: 0;
            position: absolute;
            right: 20px;
            padding: 5px;
            box-sizing: content-box;
            top: 0;
            color: white;
            background-color: rgba(111, 111, 111, 0.5);
            border-radius: 5px;
            font-size: 0.7em;
          }
    
          #countdownWrapper .row {
            margin-left: 0;
            margin-right: 0;
          }
        }
        #btnDonateWCC {
          padding-top: 8px;
          padding-bottom: 8px;
        }
        .form-group.error .help-block {
          color: #B30000;
          text-align: left;
        }
        .form-group.error input {
          border-color: #B30000;
        } */

        

/* :root {
  --purple: hsl(240, 80%, 89%);
  --pink: hsl(0, 59%, 94%);
  --light-bg: hsl(204, 37%, 92%);
  --light-gray-bg: hsl(0, 0%, 94%);
  --white: hsl(0, 0%, 100%);
  --dark: hsl(0, 0%, 7%);
  --text-gray: hsl(0, 0%, 30%);
} */


h3 {
  font-size: 1.5em;
  font-weight: 700;
}

p {
  font-size: 1em;
  line-height: 1.7;
  font-weight: 300;
  color: black;
}

.description {
  white-space: wrap;
}

a {
  text-decoration: none;
  color: inherit;
}

.wrap {
  display: flex;
  align-items: stretch;
  width: 100%;
  gap: 24px;
  padding: 24px;
  flex-wrap: wrap;
}

.box {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  position: relative;
  padding: 24px;
  background: rgb(300, 300, 300);
  box-shadow: 5px 10px 8px #888888;
  border: 1px solid;
}

.box-top {
  display: flex;
  flex-direction: column;
  position: relative;
  gap: 12px;
  margin-bottom: 36px;
}
/* image ganti fill kalo emg gajelas  */
.box-image {
  width: 100%;
  height: 360px;
  object-fit: cover; 
  object-position: 50% 20%;
}

.title-flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.box-title {
  border-left: 3px  ;
  padding-left: 12px;
  text-align: center;
}

.user-follow-info {
  color: rgb(47, 47, 47);
  text-align: center;
}

.button {
  display: block;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin-top: auto;
  padding: 16px;
  color: #000;
  background: transparent;
  box-shadow: 0px 0px 0px 1px black inset;
  transition: background 0.4s ease;
}

.button:hover {
  background: var(--purple);
}

.fill-one {
  background: var(--light-bg);
}

.fill-two {
  background: var(--pink);
}

/* RESPONSIVE QUERIES */

@media (min-width: 320px) {
  .title-flex {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 460px) {
  .title-flex {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 640px) {
  .box {
    flex-basis: calc(50% - 12px);
  }
  .title-flex {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 840px) {
  .title-flex {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 1024px) {
  .box {
    flex-basis: calc(33.3% - 16px);
  }
  .title-flex {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: start;
  }
  .user-follow-info {
    margin-top: 6px;
  }
}

@media (min-width: 1100px) {
  .box {
    flex-basis: calc(25% - 18px);
  }
}
      </style>
      <?php include_once "navbar.php" ?>
      <?
      include 'conn.php'
      ?>
    </head>
<body>
                <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="modtit">Jadwal Kotbah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div id="isi"></div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>
      <!-- <div id="mainContainer">
      <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">     -->
      <div style="padding-left:0; padding-right:0">
          <div style="width:100%;" class="mr-auto ml-auto">
              <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:20px;">
                  <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                      Daftar Pendeta            
                  </div>
                  <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                      Berikut adalah daftar Pendeta di gereja ini.           
                  </div>
              </div>
          </div>
      </div>


  
 

  <!-- coba tarik dari database ke admin page -->
  <div class="wrap">
<?php

$records = mysqli_query($sambung,"select id, jabatan.namaJabatan, nama, biodata, foto from pendeta inner join jabatan on jabatan.idJabatan=pendeta.jabatan"); // fetch data from database harus pakai join buat jabatan

while($data = mysqli_fetch_array($records))
{
?>
<!-- pembatas -->

  <div class="box" onclick="lihatJadwal(<?php echo $data['id']?>)">
    <div class="box-top"> 
      <img class="box-image" <?php echo "<img src='../admin/foto/" . $data["foto"] . "'>"; ?> >
      <div class="title-flex">
        <h3 class="box-title"><?php echo $data['nama']; ?></h3>
        <p class="user-follow-info"><?php echo $data['namaJabatan']; ?></p>
      </div>
    </div>
  </div>

<?php
}
?>
</div>


<?php mysqli_close($sambung); // Close connection ?>





    </body>
</html>