<?php
  require_once 'koneksi.php';
  session_start();
  if (isset($_GET['gereja'])) {
      $sql = "SELECT * FROM gereja WHERE link = '".$_GET['gereja']."'";
      $records = mysqli_query($sambung,$sql);
      while($data = mysqli_fetch_array($records)){
      $_SESSION['gereja'] = $data['idgereja'];
      $_SESSION['namagereja'] = $_GET['gereja'];
      }
  } else {
      header("Location: registgereja.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
   <headd>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <body>
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
            color: black;
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
        /* Full-width input fields */
        input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: white;
        }

  input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: blue;
  color: white;
  padding: 16px 20px;
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
<body>
<?php include_once "navbar.php"; ?>
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
<body>
<!-- Bikin Background Form -->
<div id="pelayanan" class="container" style="margin-bottom: 20px; margin-left:30px;">
<div style="background-image:url('https://tse2.mm.bing.net/th?id=OIP.BccjVtHxFhSRb3g37MEpdgHaFj&pid=Api&P=0'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
<!-- FORM 2 : REGISTRASI JEMAAT -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Registrasi Jemaat </b>
</div>




<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini dengan benar dan sesuai : </b>
            </div>

<!-- <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">      -->
<form action="registerAkunDatabase.php" method = "post" class="container">
<!-- Nama -->
<div class="form-group field-congregationalserviceform-name required">
<input type="tel" id="congregationalserviceform-name" class="form-control" name="fname" placeholder="Nama" aria-required="true">
<div class="help-block"></div>
</div>
<div style="display:flex;">
<div style="width:100%;">

<!-- Jenis Kelamin/Gender -->
<div class="form-group field-congregationalserviceform-gender required">
<input type="hidden" name="jenisKelamin" value=""><div id="congregationalserviceform-gender" labeloptions="{&quot;style&quot;:&quot;display:inline;&quot;}" role="radiogroup" aria-required="true">
<label class="checkbox-label-custom"><input type="radio" id="gender0" name="jenisKelamin" value="M" tabindex="3">
<span class="checkbox-span" style="margin-left:12px; margin-top:-15px; font-size:16px">Laki-Laki</span></label>&nbsp;&nbsp;&nbsp;<label class="checkbox-label-custom">
<input type="radio" id="gender1" name="jenisKelamin" value="F" tabindex="3">
<span class="checkbox-span" style="margin-left:12px; margin-top:-15px; font-size:16px">Perempuan</span></label></div>

<!-- Umur -->
<div class="help-block"></div>
</div>                                        
</div>
<div style="width:120px;">
<div class="form-group field-ageField required">
<input type="tel" id="ageField" class="form-control" name="umur" placeholder="Umur" aria-required="true">

<div class="help-block"></div>
</div>                                        
</div>
</div>

<!-- Tempat Lahir -->
<div class="form-group field-congregationalserviceform-tempatlahir">
<input type="tel" id="congregationalserviceform-tempatlahir" class="form-control" name="tempatLahir" maxlength="150" placeholder="Tempat Lahir" required>
<div class="help-block"></div>
</div>   
<!-- TanggalLahir -->
<div class="form-group field-congregationalserviceform-tempatlahir">
<input type="date" id="congregationalserviceform-tempatlahir" class="form-control" name="tanggalLahir" pattern="\d{4}-\d{2}-\d{2}" maxlength="150" placeholder="Tanggal lahir (YYYY/MM/DD)" required>
<div class="help-block"></div>
</div>   
   
<!-- Nomor Tlepon -->
<div class="form-group field-phoneField">
<input type="tel" id="phoneField" class="form-control" name="nomorTelpon" maxlength="20" placeholder="Nomor Telepon" required>

<div class="help-block"></div>
</div>           
<!-- Email -->
<div class="form-group field-congregationalserviceform-email">
<input type="tel" id="congregationalserviceform-email" class="form-control" name="email" maxlength="150" placeholder="Email" required>
<div class="help-block"></div>
</div>   

<!--Password -->
<div class="form-group field-congregationalserviceform-password" >
<input type="password"  style="border: 1px solid; border-color: rgba(0, 0, 0, 0.2);" id="congregationalserviceform-password" class="form-control" name="password" maxlength="150" placeholder="Password" required>
<div class="help-block"></div>
</div>  

<!-- KonfirmasiPassword -->
<div class="form-group field-congregationalserviceform-Confirmpassword">
<input type="password"  style="border: 1px solid; border-color: rgba(0, 0, 0, 0.2);" id="congregationalserviceform-Confirmpassword" class="form-control" name="cpassword" maxlength="150" placeholder="Konfirmasi Password" required>
<div class="help-block"></div>
</div> 
<!-- Kota -->
<div class="form-group field-congregationalserviceform-city">
    <input type="tel" id="congregationalserviceform-city" class="form-control" name="kota" maxlength="150" placeholder="Kota" required>
    
<div class="help-block"></div>
</div>

<!-- Alamat -->
<div class="form-group field-congregationalserviceform-address">
    <input type="tel" id="congregationalserviceform-address" class="form-control" name="alamat" maxlength="250" placeholder="Alamat Domisili" required>
    
<div class="help-block">
</div>
</div> 

<!-- Checkbox mau tergabung sebagai jemaat gereja  -->
<label class="checkbox-label-custom">
    <input id="checkgabungjemaat" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3" required >
    <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
    </label>
    <span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium; color: black;">Saya punya kerinduan untuk menjadi Jemaat di Gereja</span>
<br>

<br>  
   
</div>
<br>
<!-- Konfirmasi User -->
<div id="terms1Wrapper" style="display: block;">
<div style="font-size:12px; margin:0px 0px 0px 0px; color:black; opacity: 60%; text-align: center;">
    <b>Dengan mengirimkan form ini, saya bersungguh-sungguh dan punya kerinduan untuk Tuhan<br>
        serta siap untuk melanjutkan ke langkah selanjutnya dibawah naungan Gereja.</b>
</div>
<br>
<div style="size: 20px;">
    <p style= "font-size: 70%;"><span style = "color : black">Sudah punya akun?<a href="keluar.php?gereja=<?php echo $_SESSION['namagereja'];?>"> <span style = "color : red"><b>Login<b> </pan> </a> </p>
    </div>
            
<!-- Submit Button nanti masuk ke login juga harusnya-->
    <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
    <button type="submit" name="daftar" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color: green; color:white;">Daftar</button> </a> </pan>                               
</div>
    </div>
    
</div>
</form>


</body>
<footer>
  <p style = "font-size : 105%"><span style = "color : black">Informasi Registrasi Gereja : <br>
  <a href="registgereja.php"><span style = "color : blue">Kunjungi Pendaftaran Gereja</a></p> 
  <br>
  <br> 
  <p style = "font-size : 105%"><span style = "color : black"><b>Kontak : 08123456789 , Bambang Adiwijaya </b><br>
  <a style = "color : black"> Alamat : Jalan Cikareng 15 , Surabaya Timur, Indonesia </a> </p>
  <a style = "color : red"> Jam Operasional : 10.00-15.00 WIB </a> </p>
</footer>
</head>
</html>