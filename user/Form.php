<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- <meta name="csrf-param" content="_csrf">
      <meta name="csrf-token" content="eFnI7r69sRmjJ4WVIYs1pCAeux2VJAtUpBDAhbT2rLNKbZuk8YTQfdFi7e8R2gTFelb3a_RGUxf7fqrgxLH9ig=="> -->
      <link href="https://gmschurch.azureedge.net/gmsbaratlandingpagedata/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
      </head>

    <body>
        <?php include_once "navbar.php" ?>

      <div id="mainContainer">
        <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
    <div style="padding-left:0; padding-right:0">
        <div style="width:100%;" class="mr-auto ml-auto">
            <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:15px;">
                <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                    Online Form                
                </div>
                <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                    Silahkan isi form dibawah ini dengan kerinduan hati bersama Tuhan <br>
                    Tuhan Memberkati.                
                </div>
            </div>
            <div class="mt-4" style="max-width:800px; margin:auto;">
                <div class="streaming-sydney-revival-service">
                <form id="w0" class="submit-form" action="/form/submit-iftn" method="post">
    <input type="hidden" name="_csrf" value="jdwIbDQwYoscgf9_f2BT2xmBiioJIpPYQPnC3Gx8NyS_6FsmewkD727ElwVPMWK6Q8nGXGhAy5sfl6i5HDtmHQ==">       
            <div class="container" style="margin-bottom:20px;">    
            <div style="text-align:left;">
            <div style="font-size:18px; margin-bottom:20px;">Ya, Saya siap:</div>
            <div class="form-group field-congregationalserviceform-checked_form">
              <div id="congregationalserviceform-checked_form" aria-invalid="false"><label id="checkmarklabel0" class="checkmark-custom">

 <input type="checkbox" class="check-checkmark " id="checkmark0" name="CongregationalServiceForm[checked_form][]" value="MenerimaYesus" tabindex="3">
      <span id="checkmarkspan0" class="checkmark-title"> Pelayanan </span>
 <div class="checkmark-detail">
  Saya terpanggil untuk lebih melayani Tuhan melalui pelayanan gereja.
 </div>
      <span class="checkmark"></span>
      </label>
      <label id="checkmarklabelbaptism" class="checkmark-custom">
  <input type="checkbox" class="check-checkmark " id="checkmark1" name="CongregationalServiceForm[checked_form][]" value="BABTISM" tabindex="3">
      <span id="checkmarkspan1" class="checkmark-title"> Baptisme </span>
  <div class="checkmark-detail">
    Saya ingin berjalan bersama Yesus dan siap untuk lahir baru dengan dibaptis.
   </div>
      <span class="checkmark"></span>
      </label>
      <label id="checkmarklabelbaptism1" class="checkmark-custom">
<input type="checkbox" class="check-checkmark " id="checkmark2" name="CongregationalServiceForm[checked_form][]" value="CG" tabindex="3">
    <span id="checkmarkspan2" class="checkmark-title"> Komunitas Sel / CG </span>
<div class="checkmark-detail">
    Saya punya kerinduan untuk join dalam kegiatan Komunitas Sel / CG
   </div>
    <span class="checkmark"></span>
    </label>
    <label id="checkmarklabelbaptism2" class="checkmark-custom">
<input type="checkbox" class="check-checkmark " id="checkmark3" name="CongregationalServiceForm[checked_form][]" value="PermohonanDoa" tabindex="3">
    <span id="checkmarkspan3" class="checkmark-title"> Pokok/Permohonan Doa </span>
<div class="checkmark-detail">
  Saya memiliki pokok-pokok doa dan ingin didoakan.
 </div>
      <span class="checkmark"></span>
      </label>
      <label id="checkmarklabelbaptism3" class="checkmark-custom">
<input type="checkbox" class="check-checkmark " id="checkmark4" name="CongregationalServiceForm[checked_form][]" value="Kesaksian" tabindex="3">
     <span id="checkmarkspan4" class="checkmark-title"> Kesaksian Pribadi </span>
<div class="checkmark-detail">
    Hati saya tergerak untuk mengirimkan dan menyampaikan kesaksian saya.
</div>
    <span class="checkmark"></span>
    </label>
    <label id="checkmarklabelbaptism4" class="checkmark-custom">
<input type="checkbox" class="check-checkmark " id="checkmark5" name="CongregationalServiceForm[checked_form][]" value="Pernikahan" tabindex="3">
    <span id="checkmarkspan5" class="checkmark-title"> Pemberkatan Pernikahan </span>
<div class="checkmark-detail">
  Saya ingin mengajukan permohonan pemberkatan untuk pernikahan
 </div>
    <span class="checkmark"></span>
    </label>
    <label id="checkmarklabelbaptism5" class="checkmark-custom">
</div>
<br>

<!-- Bikin Background Form -->
<div id="pelayanan" class="container" style="margin-bottom: 20px;">
    <div style="background-image:url('https://tse2.mm.bing.net/th?id=OIP.BccjVtHxFhSRb3g37MEpdgHaFj&pid=Api&P=0'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
        
<!-- FORM 1 : Pelayanan -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Pelayanan </b>
</div>
<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini</b>
            </div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     

<!-- Kategori Connect Group -->
<div class="form-group field-congregationalserviceform-cg_category">

    <select id="congregationalserviceform-cg_category" class="form-control" name="CongregationalServiceForm[cg_category]">
    <option value="">Kategori Komunitas Sel</option>
    <option value="eaglekidz">Anak-Anak (TK - SD) </option>
    <option value="aog teens">Pelajar (SMP - SMA)</option>
    <option value="aog youth">Mahasiswa</option>
    <option value="family">Keluarga</option>
    </select>

    <div class="help-block"></div> 
    </div>

<!-- Pernah ikut Pelayanan -->
<div class="form-group field-congregationalserviceform-pelayanan">
    <input type="text" id="congregationalserviceform-pelayanan" class="form-control" name="CongregationalServiceForm[pelayanan]" maxlength="150" placeholder="Pernah ikut pelayanan di gereja ? (Ya/Tidak)">
    
<div class="help-block"></div>
</div>

<!-- Kategori Pelayanan -->
<div class="form-group field-congregationalserviceform-cg_categorypelayanan">

    <select id="congregationalserviceform-cg_categorypelayanan" class="form-control" name="CongregationalServiceForm[cg_categorypelayanan]">
    <option value="">Kategori Pelayanan</option>
    <option value="worshipleader">Worship Leader/WL </option>
    <option value="singer">Singer/Pembawa Pujian</option>
    <option value="drumer">Drumer/Pemain Drum</option>
    <option value="bass">Bass</option>
    <option value="operator">Operator</option>
    <option value="usher">Usher/Penerima Tamu</option>
    <option value="kollektan">Kollektan/Pembawa Persembahan</option>
    <option value="timkonseling">Tim Konseling</option>
    </select>

    <div class="help-block"></div> 
    </div>
 
<!-- Status Pernikahan -->
<div class="form-group field-congregationalserviceform-marital_status">

    <select id="congregationalserviceform-marital_status" class="form-control" name="CongregationalServiceForm[marital_status]">
    <option value="">Status Pernikahan</option>
    <option value="single">Belum Menikah</option>
    <option value="married">Menikah</option>
    <option value="others">Lainnya</option>
    </select>
        
<div class="help-block"></div>
</div>

<!-- Kalimat Tambahan  -->
<div id="pelayanan" style="display: block;">
    <b>Selamat atas keputusan dan kerinduan anda. Setelah ini tim <br>
    gereja akan memberikan informasi lebih lanjut kepada anda</b>
</div>
</div>  
   

<input type="hidden" id="congregationalserviceform-postal_code" name="CongregationalServiceForm[postal_code]">                                    
</div>

<div style="margin-top:-15px; margin-bottom:20px; text-align:right; font-size:12px; color: black;">
<span id="inputPrayer"><b>0</span>/500 maks karakter</b>
</div>                           
</div>

<!-- Konfirmasi User -->
<div id="terms1Wrapper" style="display: block;">
<div style="font-size:12px; margin:0px 0px 0px 0px; color:black; text-align: justify;">
    <b>Dengan mengirimkan form ini, saya telah membaca dan memahami formulir di atas dengan saksama dan siap untuk melanjutkan ke langkah selanjutnya dibawah naungan Gereja.</b>
</div>
            
<!-- Submit Button -->
    <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
    <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:blue;">SUBMIT</button>                                
</div>
    </div>
</div>

<br>

<!-- Bikin Background Form -->
<div id="baptism" class="container" style="margin-bottom: 20px;">
    <div style="background-image:url('http://1.bp.blogspot.com/-QDoNbbUDWsc/T3skQ0sbD8I/AAAAAAAAATw/O7cgoZv2oLc/s1600/church-from-the-movie-the-birds-bodega-bay-california-other.jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
    

<!-- FORM 2 : BAPTIS -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Baptisme </b>
</div>
<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini</b>
            </div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     
<label class="checkbox-label-custom">
    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3">
    <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
</label>
<span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium;">Saya ingin bergabung dalam CG / I want to join CG</span>

<!-- Kategori Connect Group -->
<div class="form-group field-congregationalserviceform-cg_category">

    <select id="congregationalserviceform-cg_category" class="form-control" name="CongregationalServiceForm[cg_category]">
    <option value="">Kategori Komunitas Sel/CG</option>
    <option value="eaglekidz">Anak-Anak (TK - SD) </option>
    <option value="aog teens">Pelajar (SMP - SMA)</option>
    <option value="aog youth">Mahasiswa</option>
    <option value="family">Keluarga</option>
    </select>

    <div class="help-block"></div> 
    </div>
  
   
<input type="hidden" id="congregationalserviceform-postal_code" name="CongregationalServiceForm[postal_code]">                                    
</div>

<br> 
<div style="margin-top:-15px; margin-bottom:20px; text-align:right; font-size:12px; color: black;">
<span id="inputPrayer"><b>0</span>/500 maks karakter</b>
</div>                           
</div>

<!-- Konfirmasi User -->
<div id="baptism" style="display: block;">
<div style="font-size:12px; margin:0px 0px 0px 0px; color:black; text-align: justify;">
    <b>Dengan mengirimkan form ini, saya telah membaca dan memahami formulir di atas dengan saksama dan siap untuk melanjutkan ke langkah selanjutnya dibawah naungan Gereja.</b>
</div>
            
<!-- Submit Button -->
    <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
    <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:blue;">SUBMIT</button>                                
</div>
    </div>
</div>
</div>

<br>

<!-- Bikin Background Form -->
<div id="komunitasel" class="container" style="margin-bottom: 20px;">
    <div style="background-image:url('http://1.bp.blogspot.com/_UI57Ge2RcHU/S8EcrUi4CDI/AAAAAAAAAB4/jF79TPUMmxI/w1200-h630-p-k-no-nu/Jesus+(7).jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
    
<!-- FORM 3 : Komunitas Sel / CG -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Komunitas Sel/CG</b>
</div>
<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini</b>
            </div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     

<!-- Kategori Connect Group -->
<div class="form-group field-congregationalserviceform-cg_category">

    <select id="congregationalserviceform-cg_category" class="form-control" name="CongregationalServiceForm[cg_category]">
    <option value="">Kategori Komunitas Sel/CG</option>
    <option value="eaglekidz">Anak-Anak (TK - SD) </option>
    <option value="aog teens">Pelajar (SMP - SMA)</option>
    <option value="aog youth">Mahasiswa</option>
    <option value="family">Keluarga</option>
    </select>

    <div class="help-block"></div> 
    </div>
 
<!-- Status Pernikahan -->
<div class="form-group field-congregationalserviceform-marital_status">

    <select id="congregationalserviceform-marital_status" class="form-control" name="CongregationalServiceForm[marital_status]">
    <option value="">- Status Pernikahan -</option>
    <option value="single">Belum Menikah</option>
    <option value="married">Menikah</option>
    <option value="others">Lainnya</option>
    </select>
        
<div class="help-block"></div>
</div>
  
<input type="hidden" id="congregationalserviceform-postal_code" name="CongregationalServiceForm[postal_code]">                                    
</div>

<br> 
<div style="margin-top:-15px; margin-bottom:20px; text-align:right; font-size:12px;color: black;">
<span id="inputPrayer"><b>0</span>/500 maks karakter</b>
</div>                           
</div>

<!-- Konfirmasi User -->
<div id="komunitasel" style="display: block;">
<div style="font-size:12px; margin:10px 10px 10px 0px; color:black; text-align: left;">
    <b>Dengan mengirimkan form ini, saya telah membaca dan memahami formulir di atas dengan saksama dan siap untuk melanjutkan ke langkah selanjutnya dibawah naungan Gereja.</b>
</div>
            
<!-- Submit Button -->
    <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
    <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:blue;">SUBMIT</button>                                
</div>
    </div>
</div>

<br>

</div>
<br>
<!-- Bikin Background Form -->
<div id="pokokdoa" class="container" style="margin-bottom: 20px;">
    <div style="background-image:url('https://lh5.googleusercontent.com/proxy/eU16FfOHvSB8twx9hftHhYDSs03krzSZTmOvQ9UxpciZhFiJnrQurIVGRbaqsjaSPBAnxAAYhuNitWtDMlPS-svgYAzAAYuJyPebOI3Y3A=w1200-h630-p-k-no-nu'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
    

<!-- FORM 4 : Pokok Doa  -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Pokok/Permohonan Doa </b>
</div>
<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini</b>
            </div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     

<!-- Kategori Permohonan Doa -->
<div class="form-group field-congregationalserviceform-cg_category">

    <select id="congregationalserviceform-cg_category" class="form-control" name="CongregationalServiceForm[cg_category]">
    <option value="">Kategori Permohonan Doa</option>
    <option value="eaglekidz">Kesehatan/Kesembuhan </option>
    <option value="eaglekidz">Keluarga/Pasangan </option>
    <option value="aog teens">Usaha dan Pekerjaan</option>
    <option value="aog youth">Pendidikan</option>
    <option value="family">Lainnya</option>
    </select>

    <div class="help-block"></div> 
    </div>

<!-- Isi Permohonan Doa -->
<div class="form-group field-congregationalserviceform-pokokdoa">
    <input type="text" id="congregationalserviceform-pokokdoa" class="form-control" name="CongregationalServiceForm[pokokdoa]" maxlength="500" placeholder="Permohonan Doa">
    
<div class="help-block">
</div>
</div> 

<label class="checkbox-label-custom">
    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3">
    <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
</label>
<span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium;">Saya bersedia untuk dihubungi lebih lanjut oleh tim Gereja</span>
  
   
<input type="hidden" id="congregationalserviceform-postal_code" name="CongregationalServiceForm[postal_code]">                                    
</div>

<br> 
<div style="margin-top:-15px; margin-bottom:20px; text-align:right; font-size:12px; color: black;">
<span id="inputPrayer"><b>0</span>/500 maks karakter</b>
</div>                           
</div>

<!-- Konfirmasi User -->
<div id="pokokdoa" style="display: block;">
<div style="font-size:12px; margin:0px 0px 0px 0px; color:black; text-align: justify;">
    <b>Dengan mengirimkan form ini, saya telah membaca dan memahami formulir di atas dengan saksama dan siap untuk melanjutkan ke langkah selanjutnya dibawah naungan Gereja.</b>
</div>
            
<!-- Submit Button -->
    <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
    <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:blue;">SUBMIT</button>                                </div>
    </div>
</div>
</div>

<br>

</div>

<!-- Bikin Background Form -->
<div id="kesaksian" class="container" style="margin-bottom: 20px;">
    <div style="background-image:url('https://www.jawaban.com/assets/uploads/lori_mora/images/main/160222161715.jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
<!-- FORM 5 : Kesaksian Pribadi  -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b> Kesaksian Pribadi</b>
</div>
<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini</b>
            </div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">   

<!-- Isi Kesaksian Singkat -->
<div class="form-group field-congregationalserviceform-pokokdoa">
    <input type="text" id="congregationalserviceform-pokokdoa" class="form-control" name="CongregationalServiceForm[pokokdoa]" maxlength="500" placeholder="Ceritakan secara singkat">
    
<div class="help-block">
</div>
</div> 

<label class="checkbox-label-custom">
    <input id="kesaksian" type="checkbox" class="check-join-kesaksian check-checkmark" value="1" tabindex="3">
    <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
</label>
<span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium;">Saya bersedia untuk dihubungi lebih lanjut oleh tim Gereja</span>
  
   
<input type="hidden" id="congregationalserviceform-postal_code" name="CongregationalServiceForm[postal_code]">                                    
</div>

<br> 
<div style="margin-top:-15px; margin-bottom:20px; text-align:right; font-size:12px; color: black;">
<span id="inputPrayer"><b>0</span>/500 maks karakter</b>
</div>                           
</div>

<!-- Konfirmasi User -->
<div id="kesaksian" style="display: block;">
<div style="font-size:12px; margin:0px 0px 0px 0px; color:black; text-align: justify;">
    <b>Dengan mengirimkan form ini, saya telah membaca dan memahami formulir di atas dengan saksama dan siap untuk melanjutkan ke langkah selanjutnya dibawah naungan Gereja.</b>
</div>
            
<!-- Submit Button -->
    <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
    <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:blue;">SUBMIT</button>                                
</div>
    </div>
</div>
</div>

<br>

</div>

<!-- Bikin Background Form -->
<div id="pernikahan" class="container" style="margin-bottom: 20px;">
    <div style="background-image:url('https://www.jawaban.com/assets/uploads/lori_mora/images/main/160222161715.jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
<!-- FORM 6 : Pemberkatan Pernikahan  -->
<div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b> Pemberkatan Pernikahan </b>
</div>
<div id="form" >
    <div class="container" style="margin-bottom:20px;">
        <div style="background-color:white; border-radius:10px; padding:20px;">

            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                <b>Silahkan isi form berikut ini</b> <br>
                <br>
                <b>Detail Pasangan Pria :</b>
            </div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     
<!-- Nama -->
<div class="form-group field-congregationalserviceform-name required">
<input type="text" id="congregationalserviceform-name" class="form-control" name="CongregationalServiceForm[name]" placeholder="Nama Pasangan Pria" aria-required="true">
<div class="help-block"></div>
</div>
<div style="display:flex;">
<div style="width:100%;">


<!-- Nomor Tlepon -->
<div class="form-group field-phoneField">
<input type="tel" id="phoneField" class="form-control" name="CongregationalServiceForm[phone_number]" maxlength="20" placeholder="Nomor Telepon Pria">

<div class="help-block"></div>
</div> 

<label class="checkbox-label-custom">
    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3">
    <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
</label>
<span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium;">Sudah dibaptis dan menerima Tuhan sebagai Juruselamat</span>

<br>
<br>

<div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
    <b>Detail Pasangan Wanita :</b>
</div>

<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     
<!-- Nama -->
<div class="form-group field-congregationalserviceform-name required">
<input type="text" id="congregationalserviceform-name" class="form-control" name="CongregationalServiceForm[name]" placeholder="Nama Pasangan Wanita" aria-required="true">
<div class="help-block"></div>
</div>
<div style="display:flex;">
<div style="width:100%;">


<!-- Nomor Tlepon -->
<div class="form-group field-phoneField">
<input type="tel" id="phoneField" class="form-control" name="CongregationalServiceForm[phone_number]" maxlength="20" placeholder="Nomor Telepon Wanita">

<div class="help-block"></div>
</div> 

<label class="checkbox-label-custom">
    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3">
    <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
</label>
<span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium;">Sudah dibaptis dan menerima Tuhan sebagai Juruselamat</span>

<br>

<br>

<div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
    <b>Lengkapi dengan benar form pengajuan dibawah ini : </b>
</div>
<input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">  

<!-- Tanggal Pernikahan-->
<div class="form-group field-congregationalserviceform-tanggal required">
<input type="text" id="congregationalserviceform-tanggal" class="form-control" name="CongregationalServiceForm[tanggal]" placeholder="DD/MM/YYYY" aria-required="true">
<div class="help-block"></div>
</div>
<div style="display:flex;">
<div style="width:100%;">


<!-- Lokasi Pernikahan-->
<div class="form-group field-congregationalserviceform-lokasi required">
    <input type="text" id="congregationalserviceform-lokasi" class="form-control" name="CongregationalServiceForm[lokasi]" placeholder="Lokasi Pernikahan (disertai kota)" aria-required="true">
    <div class="help-block"></div>
    </div>
    <div style="display:flex;">
    <div style="width:100%;">

<br>
</div>
</div>

<!-- Konfirmasi User -->
<div id="pernikahan" style="display: block;">
    <div style="font-size:12px; margin:0px 0px 0px 0px; color:grey; text-align: justify;">
        <b>Dengan mengirimkan form ini, saya telah bersungguh-sungguh dalam proses pengajuan dan saya tau bahwa ini bukan form pendaftaran.</b>
    </div>
                
    <!-- Submit Button -->
        <div class="form-group" style="margin-top:25px;margin-bottom:25px;">
        <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:blue;">SUBMIT</button>                                
    </div>
        </div>
    </div>
    </div>



    </body>
   </head>
</html>