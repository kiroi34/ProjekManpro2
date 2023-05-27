<?php
  if (isset($_SESSION['masuk'])){
    header("location:Homeuser.php");
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
        text-align: left;
      }
      .form-group.error input {
        border-color: #B30000;
      }

      /* Full-width input fields */
      input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #c1c1c1;
      }

      /* Set a style for the submit button */
      .btn {
        background-color: blue;
        color: white;
        padding: 18px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }

      .btn:hover {
        opacity: 1;
      }

      .bg-image {
        /* The image used */
        background-image: url("bgbaru.jpg");
        /* Add the blur effect */
        filter: blur(2px);
        -webkit-filter: blur(5px);
        
        /* Full height */
        height: 100%; 
      
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }

      footer {
        padding: 3px;
        background-color: white;
        text-align : center;
        color: white;
      }
    </style>
  </head>

  <body>
    <?php
      include_once "navbar.php"
    ?>

    <script>
      function myFunction() { 
        var x = document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

    <div id="mainContainer">
      <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
        <div style="padding-left:0; padding-right:0">
          <div style="width:100%;" class="mr-auto ml-auto">
            <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:15px;">
              <div class="cginfo-custom mr-auto ml-auto" style="font-size:35px; margin-top:50px; color:white; max-width:900px; text-align: center;">
              SELAMAT DATANG dan WELCOME HOME               
              </div>
              <div class="mr-auto ml-auto" style="font-size:14px; margin-left: 50px; color:#a5a5a5; max-width:770px; text-align: center;">
              Silahkan isi form dibawah ini sesuai dengan tujuan anda. Tuhan Yesus Memberkati.              
              </div>
            </div>

            <div class="mt-4" style="max-width:800px; margin:auto;">
                <div class="streaming-sydney-revival-service">

                
    <input type="hidden" name="_csrf" value="jdwIbDQwYoscgf9_f2BT2xmBiioJIpPYQPnC3Gx8NyS_6FsmewkD727ElwVPMWK6Q8nGXGhAy5sfl6i5HDtmHQ==">       
            <div class="container" style="margin-bottom:20px;">    
            <div style="text-align:left;">
            <div class="form-group field-congregationalserviceform-checked_form">
              <div id="congregationalserviceform-checked_form" aria-invalid="false"><label id="checkmarklabel0" class="checkmark-custom">
  </style>               
<script>function myFunction() { 
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}</script>
                          <!-- Bikin Background Form -->
                          <div id="pelayanan" class="container" style="margin-bottom: 20px;">
                            <div style="background-image:url('https://tse2.mm.bing.net/th?id=OIP.BccjVtHxFhSRb3g37MEpdgHaFj&pid=Api&P=0'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                          
                              <!-- FORM : Login -->
                              <div style="font-size:18px; margin-bottom:15px; color:black; text-align:center; background-color: white;"> <b>LOGIN </b>
                              </div>
                              <div id="form" >
                                <div class="container" style="margin-bottom:20px;">
                                  <div style="background-color:black; border-radius:10px; padding:20px;">

                                    <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                                      <b>Silahkan isi form login berikut ini dengan benar dan sesuai : </b>
                                    </div>

                                    <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     
                                    <div class="bg-image"> </div>
                                      <form action="cocokAkunLogin.php" method = "post" class="container">

                                        <!-- email no telp -->
                                        <label for="username">
                                          <b style = "color : black"></b>
                                        </label>
                                        <input type="text" placeholder="Email/Nomor Telepon" name="username" required>
                                        
                                        <!-- pass -->
                                        <label for="password">
                                          <b style = "color : #f4f2ff"></b>
                                        </label>
                                        <input type="password" placeholder="Password" name="password" id="myInput" required> 

                                        <input type="checkbox" onclick="myFunction() ">
                                          <span style = "color : white">
                                            Lihat Password 
                                          </span>
                                        <div class="link forget-pass text-left">
                                          <p style = "font-size: 80%">
                                          <a href="verifikasiemail.php">
                                            <span style = "color : red">
                                              Lupa password?
                                            </span>
                                          </a>
                                        </div>
                                        <div class="form-group">
                                          <p style = "font-size : 75%">
                                            <span style = "color : white">
                                              Belum punya akun? 
                                            </span>
                                            <a href="register.php">
                                              <span style = "color :red">
                                                Buat akun baru
                                              </span>
                                            </a> 
                                          </p>
                                          <button type="submit" class="btn" value="login">
                                            <span style= "color : white">
                                            <b>Masuk<b>
                                          </button>
                                        </div>
                                      </form>
                                  </div>
  </body>
<br>
  <footer>
    <p style = "font-size : 105%">
      <span style = "color : black">
        Informasi Registrasi Gereja: 
      </span>
      <br>
      <a href="registgereja.php">
        <span style = "color : blue">
          Kunjungi Pendaftaran Gereja
        </span>
      </a>
    </p> 

    <br>
    <br>

    <p style = "font-size : 105%">
      <span style = "color : black">
        <b> Kontak : 08123456789 , Bambang Adiwijaya </b>
      </span>
      <br>
      <a style = "color : black"> Alamat : Jalan Cikareng 15 , Surabaya Timur, Indonesia </a>
    </p>
    
    <a style = "color : red"> Jam Operasional : 10.00-15.00 WIB </a>
    </p>
  </footer>
</html>