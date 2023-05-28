<?php
include_once 'koneksi.php';
session_start();
if (isset($_GET['gereja'])) {
  $sql = "SELECT * FROM gereja WHERE link = '".$_GET['gereja']."'";
  $stmt = $sambung->query($sql);
  if (!isset($_SESSION['gereja'])) {
    foreach ($stmt as $data) {
      $_SESSION['gereja'] = $data['idgereja'];
    }
  } 
} else {
  header("Location: registgereja.php");
}
if (!isset($_SESSION['gereja'])) {
  header("Location: registgereja.php");
}
?>




<!DOCTYPE html>
<html lang="en">
   <head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-param" content="_csrf">
      <meta name="csrf-token" content="eFnI7r69sRmjJ4WVIYs1pCAeux2VJAtUpBDAhbT2rLNKbZuk8YTQfdFi7e8R2gTFelb3a_RGUxf7fqrgxLH9ig==">
      <link href="https://gmschurch.azureedge.net/gmsbaratlandingpagedata/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">
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
      </style>
      </head>
      <body>
      <?php include_once "navbar.php" ?>

      <div id="bannerOuterWrapper">
        <picture>
          <img src ="assets/<?php foreach ($stmt as $data) { echo $data['fotogereja'];}?>" alt="Banner" class="w-100">
        </picture>
        </div>
       
      <div class="bg-lightgrey pt-4 pb-3">
        <div class="container">
          <div>
            <h1 id="aboutus" class="text-center">Tentang Kami</h1>
            <p class="text-center"><?php foreach ($stmt as $data) { echo $data['tentang'];}?></p>
          </div>
          <div>
            <h1 id="visi" class="text-center">Visi</h1>
            <p class="text-center"><?php foreach ($stmt as $data) { echo $data['visi'];}?></p>
          </div>
          <div>
            <h1 id="misi" class="text-center">
              Misi      </h1>
            <p class="text-center"><?php foreach ($stmt as $data) { echo $data['misi'];}?></p>
          </div>
        </div>
      </div>
      <div class=" bg-black pt-4 pb-3">
        <div class="container" style=" margin-bottom: 60px">
            <div>
              <div class="row">
                <div class="col-md-3 text-center">
                  <img src="assets/<?php foreach ($stmt as $data) { echo $data['fotopendeta'];}?>" loading="lazy" class="w-100" style="max-width: 240px; margin-top: 20px;" alt="Gembala">
                  <div class="mb-4 d-md-block"></div>
                  
                </div>
                <div class="col-md-9">
                  <p>
                    <h1 id="profilpendeta" class="text-center" style="background-color: #D3D3D3 ; margin-bottom: 42px;">PROFIL PENDETA </h1>
                  <p class="text-justify" style="margin-bottom: 30px;"><?php foreach ($stmt as $data) { echo $data['informasipendeta'];}?></p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </body>
</html>