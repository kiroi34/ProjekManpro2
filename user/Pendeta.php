<?php
require_once "../admin/connByAlan.php";
  
  $timesql = "SELECT * FROM jabatan ";
  $timestmt = $pdo->prepare($timesql);
  $timestmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
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
     <style>

    body{
          font-family: 'Poppins';font-size: 18px;
        }

        @media (min-width : 768px) {
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
        }
      </style>
      <?php include_once "navbar.html" ?>
      <?
      include 'conn.php'
      ?>
    </head>
<body>
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
<?php

include 'koneksi.php'; // Using database connection file here

$records = mysqli_query($sambung,"select id, jabatan.namaJabatan, nama, biodata, foto from pendeta inner join jabatan on jabatan.idJabatan=pendeta.jabatan"); // fetch data from database harus pakai join buat jabatan

while($data = mysqli_fetch_array($records))
{
?>
<!-- pembatas -->
<div class="wrap">
  <div class="box">
    <div class="box-top"> 
      <img class="box-image" <?php echo "<img src='../admin/foto/" . $data["foto"] . "'>"; ?> >>
      <div class="title-flex">
        <h3 class="box-title"><?php echo $data['nama']; ?></h3>
        <p class="user-follow-info"><?php echo $data['namaJabatan']; ?></p>
      </div>
      <p class="description"><?php echo $data['biodata']; ?></p>
    </div>
  </div>

<?php
}
?>


<?php mysqli_close($sambung); // Close connection ?>





    </body>
</html>