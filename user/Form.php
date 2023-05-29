<?php
    require_once "php/connect.php";
    if (!isset($_SESSION['user'])) {
        echo "<script>alert('Silakan login terlebih dahulu sebelum mendaftar form..');
        window.location = 'keluar.php?gereja=".$_GET['gereja']."';
        </script>";
    } 
    if (isset($_GET['gereja'])) {
        $sql = "SELECT * FROM gereja WHERE link = '".$_GET['gereja']."'";
        $stmt = $conn->query($sql);
        $data = $stmt->fetch();
        $_SESSION['gereja'] = $data['idgereja'];
        $_SESSION['namagereja'] = $_GET['gereja'];
    } else {
        // header("Location: registgereja.php");
    }

?>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


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
      <script>
        function start() {
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status']==1) {
                    $teks = 'Barangsiapa melayani Aku, ia harus mengikut Aku dan di mana Aku berada, di situpun pelayan-Ku akan berada. Barangsiapa melayani Aku, ia akan dihormati Bapa. (Yohanes 12:26)';
                } elseif ($_GET['status']==2) {
                    $teks = 'Bertobatlah dan hendaklah kamu masing-masing memberi dirimu dibaptis dalam nama Yesus Kristus untuk pengampunan dosamu, maka kamu akan menerima karunia Roh Kudus. (Kisah Para Rasul 2:38b)';
                } elseif ($_GET['status']==3) {
                    $teks = 'Sebab di mana dua atau tiga orang berkumpul dalam nama-Ku, di situ Aku ada di tengah-tengah mereka. (Matius 18:20)';
                } elseif ($_GET['status']==4) {
                    $teks = 'Berserulah kepada-Ku dan Aku akan menjawabmu, dan menunjukkan kepadamu hal-hal yang besar dan tersembunyi yang tidak kamu ketahui. (Yeremia 33:3)';
                } elseif ($_GET['status']==5) {
                    $teks = '”Kamu inilah saksi-saksi-Ku,” demikianlah firman TUHAN, ”dan hamba-Ku yang telah Kupilih, supaya kamu tahu dan percaya kepada-Ku dan mengerti, bahwa Aku tetap Dia. Sebelum Aku tidak ada Allah dibentuk, dan sesudah Aku tidak akan ada lagi. (Yesaya 43:10)';
                } elseif ($_GET['status']==6) {
                    $teks = 'Dan di atas semuanya itu: kenakanlah kasih, sebagai pengikat yang mempersatukan dan menyempurnakan. (Kolose 3:14)';
                }
                echo "Swal.fire({
                    icon: 'success',
                    title: 'Submit Berhasil!',
                    html: '".$teks."',
                    showConfirmButton: true,
                    timer: 5000
                  }).then((result) => {
                    window.location = 'Form.php?gereja=".$_SESSION['namagereja']."';
                  })";
            }
            ?>
        }
        function pilihForm() {
            val = document.getElementById('formulir').value;
            if (val == '0') {
                document.getElementById('ket').innerHTML = '';
                document.getElementById('isiForm').innerHTML = '';
            } else if (val == '1') {
                <?php
                    $sql = 'SELECT * FROM kategoripelayanan';
                    $stmt = $conn->query($sql);
                    $data = $stmt->fetchAll();
                ?>
                document.getElementById('ket').innerHTML = 'Saya terpanggil untuk lebih melayani Tuhan melalui pelayanan gereja.';
                document.getElementById('isiForm').innerHTML = `<!-- Bikin Background Form -->
                <div id="pelayanan" class="container" style="margin-bottom: 20px;">
                    <div style="background-image:url('https://tse2.mm.bing.net/th?id=OIP.BccjVtHxFhSRb3g37MEpdgHaFj&pid=Api&P=0'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                        
                <!-- FORM 1 : Pelayanan -->
                <div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Pelayanan </b>
                </div>
                <form action="php/submitpelayanan.php" method="post">
                <div id="form" >
                    <div class="container" style="margin-bottom:20px;">
                        <div style="background-color:white; border-radius:10px; padding:20px;">

                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                                <b>Silahkan isi form berikut ini</b>
                            </div>

                <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     

                <!-- Kategori Connect Group -->
                <div class="form-group field-congregationalserviceform-cg_category">

                    <select id="congregationalserviceform-cg_category" class="form-control" name="kategorisel" required>
                    <option value="" style="display:none">Kategori Komunitas Sel</option>
                    <option value="1">Anak-Anak (TK - SD) </option>
                    <option value="2">Pelajar (SMP - SMA)</option>
                    <option value="3">Mahasiswa</option>
                    <option value="4">Keluarga</option>
                    </select>

                    <div class="help-block"></div> 
                    </div>

                <!-- Pernah ikut Pelayanan -->
                <div class="form-group field-congregationalserviceform-pelayanan">
                    <input type="text" id="congregationalserviceform-pelayanan" class="form-control" name="pernahikut" maxlength="500" placeholder="Pernah ikut pelayanan di gereja ? (Ya/Tidak) Jika iya, sebutkan!" required>
                    
                <div class="help-block"></div>
                </div>

                <!-- Kategori Pelayanan -->
                <div class="form-group field-congregationalserviceform-cg_categorypelayanan">

                    <select id="congregationalserviceform-cg_categorypelayanan" class="form-control" name="kategoripelayanan" required>
                    <option value="" style="display:none">Kategori Pelayanan</option>
                <?php foreach ($data as $kategori) { ?>
                    <option value="<?php echo $kategori['idkategori']?>"><?php echo $kategori['namakategori']?></option>
                <?php } ?>
                    </select>

                    <div class="help-block"></div> 
                    </div>
                
                <!-- Status Pernikahan -->
                <div class="form-group field-congregationalserviceform-marital_status">

                    <select id="congregationalserviceform-marital_status" class="form-control" name="statuspernikahan" required>
                    <option value="" style="display:none">Status Pernikahan</option>
                    <option value="1">Belum Menikah</option>
                    <option value="2">Menikah</option>
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
                </form>`;
            } else if (val == '2') {
                document.getElementById('ket').innerHTML = 'Saya ingin berjalan bersama Yesus dan siap untuk lahir baru dengan dibaptis.';
                document.getElementById('isiForm').innerHTML = `<!-- Bikin Background Form -->
                <div id="baptism" class="container" style="margin-bottom: 20px;">
                    <div style="background-image:url('http://1.bp.blogspot.com/-QDoNbbUDWsc/T3skQ0sbD8I/AAAAAAAAATw/O7cgoZv2oLc/s1600/church-from-the-movie-the-birds-bodega-bay-california-other.jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                    

                <!-- FORM 2 : BAPTIS -->
                <div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Baptisme </b>
                </div>
                <form action="php/submitbaptis.php" method="post">
                <div id="form" >
                    <div class="container" style="margin-bottom:20px;">
                        <div style="background-color:white; border-radius:10px; padding:20px;">

                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                                <b>Silahkan isi form berikut ini</b>
                            </div>

                <!-- Kategori Connect Group -->
                <div class="form-group field-congregationalserviceform-cg_category">

                    <select id="congregationalserviceform-cg_category" class="form-control" name="statusbaptis" required>
                    <option value="" style="display:none">Status Pembaptisan</option>
                    <option value="1">Belum pernah dibaptis</option>
                    <option value="2">Pernah menerima baptis anak</option>
                    <option value="3">Sudah pernah dibaptis</option>
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
                </form>`;
            } else if (val == '3') {
                document.getElementById('ket').innerHTML = 'Saya punya kerinduan untuk join dalam kegiatan Komunitas Sel / CG.';
                document.getElementById('isiForm').innerHTML = `<!-- Bikin Background Form -->
                <div id="komunitasel" class="container" style="margin-bottom: 20px;">
                    <div style="background-image:url('http://1.bp.blogspot.com/_UI57Ge2RcHU/S8EcrUi4CDI/AAAAAAAAAB4/jF79TPUMmxI/w1200-h630-p-k-no-nu/Jesus+(7).jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                    
                <!-- FORM 3 : Komunitas Sel / CG -->
                <div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Komunitas Sel/CG</b>
                </div>
                <form action="php/submitcg.php" method="post">
                <div id="form" >
                    <div class="container" style="margin-bottom:20px;">
                        <div style="background-color:white; border-radius:10px; padding:20px;">

                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                                <b>Silahkan isi form berikut ini</b>
                            </div>

                <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     

                <!-- Kategori Connect Group -->
                <div class="form-group field-congregationalserviceform-cg_category">

                    <select id="congregationalserviceform-cg_category" class="form-control" name="kategorisel" required>
                    <option value="" style="display:none">Kategori Komunitas Sel/CG</option>
                    <option value="1">Anak-Anak (TK - SD) </option>
                    <option value="2">Pelajar (SMP - SMA)</option>
                    <option value="3">Mahasiswa</option>
                    <option value="4">Keluarga</option>
                    </select>

                    <div class="help-block"></div> 
                    </div>
                
                <!-- Status Pernikahan -->
                <div class="form-group field-congregationalserviceform-marital_status">

                    <select id="congregationalserviceform-marital_status" class="form-control" name="statuspernikahan" required>
                    <option value="" style="display:none">- Status Pernikahan -</option>
                    <option value="1">Belum Menikah</option>
                    <option value="2">Menikah</option>
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
                </form>`;
            } else if (val == '4') {
                document.getElementById('ket').innerHTML = 'Saya memiliki pokok-pokok doa dan ingin didoakan.';
                document.getElementById('isiForm').innerHTML = `<!-- Bikin Background Form -->
                <div id="pokokdoa" class="container" style="margin-bottom: 20px;">
                    <div style="background-image:url('https://lh5.googleusercontent.com/proxy/eU16FfOHvSB8twx9hftHhYDSs03krzSZTmOvQ9UxpciZhFiJnrQurIVGRbaqsjaSPBAnxAAYhuNitWtDMlPS-svgYAzAAYuJyPebOI3Y3A=w1200-h630-p-k-no-nu'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                    

                <!-- FORM 4 : Pokok Doa  -->
                <div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b>Pokok/Permohonan Doa </b>
                </div>
                <form action="php/submitpokokdoa.php" method="post">
                <div id="form" >
                    <div class="container" style="margin-bottom:20px;">
                        <div style="background-color:white; border-radius:10px; padding:20px;">

                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                                <b>Silahkan isi form berikut ini</b>
                            </div>

                <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     

                <!-- Kategori Permohonan Doa -->
                <div class="form-group field-congregationalserviceform-cg_category">

                    <select id="congregationalserviceform-cg_category" class="form-control" name="kategoridoa" required>
                    <option value="" style="display:none">Kategori Permohonan Doa</option>
                    <option value="1">Kesehatan/Kesembuhan </option>
                    <option value="2">Keluarga/Pasangan </option>
                    <option value="3">Usaha dan Pekerjaan</option>
                    <option value="4">Pendidikan</option>
                    <option value="5">Lainnya</option>
                    </select>

                    <div class="help-block"></div> 
                    </div>

                <!-- Isi Permohonan Doa -->
                <div class="form-group field-congregationalserviceform-pokokdoa">
                    <input type="text" id="congregationalserviceform-pokokdoa" class="form-control" name="detaildoa" maxlength="1000" placeholder="Permohonan Doa" required>
                    
                <div class="help-block">
                </div>
                </div> 

                <label class="checkbox-label-custom">
                    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3" name="contact">
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
                </form>`;
            } else if (val == '5') {
                document.getElementById('ket').innerHTML = 'Hati saya tergerak untuk mengirimkan dan menyampaikan kesaksian saya.'
                document.getElementById('isiForm').innerHTML = `<!-- Bikin Background Form -->
                <div id="kesaksian" class="container" style="margin-bottom: 20px;">
                    <div style="background-image:url('https://www.jawaban.com/assets/uploads/lori_mora/images/main/160222161715.jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                <!-- FORM 5 : Kesaksian Pribadi  -->
                <div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b> Kesaksian Pribadi</b>
                </div>
                <form action="php/submitkesaksian.php" method="post">
                <div id="form" >
                    <div class="container" style="margin-bottom:20px;">
                        <div style="background-color:white; border-radius:10px; padding:20px;">

                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:#636363; text-align:left; font-size: medium;">
                                <b>Silahkan isi form berikut ini</b>
                            </div>

                <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">   

                <!-- Isi Kesaksian Singkat -->
                <div class="form-group field-congregationalserviceform-pokokdoa">
                    <input type="text" id="congregationalserviceform-pokokdoa" class="form-control" name="isikesaksian" maxlength="1000" placeholder="Ceritakan secara singkat" required>
                    
                <div class="help-block">
                </div>
                </div> 

                <label class="checkbox-label-custom">
                    <input id="kesaksian" type="checkbox" class="check-join-kesaksian check-checkmark" value="1" tabindex="3" name="contact">
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
                </form>`;
            } else if (val == '6') {
                document.getElementById('ket').innerHTML = 'Saya ingin mengajukan permohonan pemberkatan untuk pernikahan.';
                document.getElementById('isiForm').innerHTML = `<!-- Bikin Background Form -->
                <div id="pernikahan" class="container" style="margin-bottom: 20px;">
                    <div style="background-image:url('https://www.jawaban.com/assets/uploads/lori_mora/images/main/160222161715.jpg'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">
                <!-- FORM 6 : Pemberkatan Pernikahan  -->
                <div style="font-size:18px; margin-bottom:15px; color:white; text-align:center; background-color: black;"> <b> Pemberkatan Pernikahan </b>
                </div>
                <form action="php/submitpernikahan.php" method="post">
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
                <input type="text" id="congregationalserviceform-name" class="form-control" name="namapria" placeholder="Nama Pasangan Pria" aria-required="true" required>
                <div class="help-block"></div>
                </div>
                <div style="display:flex;">
                <div style="width:100%;">


                <!-- Nomor Tlepon -->
                <div class="form-group field-phoneField">
                <input type="tel" id="phoneField" class="form-control" name="nopria" maxlength="20" placeholder="Nomor Telepon Pria" required>

                <div class="help-block"></div>
                </div> 

                <label class="checkbox-label-custom">
                    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3" name="statuspria">
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
                <input type="text" id="congregationalserviceform-name" class="form-control" name="namawanita" placeholder="Nama Pasangan Wanita" aria-required="true" required>
                <div class="help-block"></div>
                </div>
                <div style="display:flex;">
                <div style="width:100%;">


                <!-- Nomor Tlepon -->
                <div class="form-group field-phoneField">
                <input type="tel" id="phoneField" class="form-control" name="nowanita" maxlength="20" placeholder="Nomor Telepon Wanita" required>

                <div class="help-block"></div>
                </div> 

                <label class="checkbox-label-custom">
                    <input id="checkmarkCG2" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3" name="statuswanita">
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
                <input type="date" id="congregationalserviceform-tanggal" class="form-control" name="tanggal" aria-required="true" required>
                <div class="help-block"></div>
                </div>
                <div style="display:flex;">
                <div style="width:100%;">


                <!-- Lokasi Pernikahan-->
                <div class="form-group field-congregationalserviceform-lokasi required">
                    <input type="text" id="congregationalserviceform-lokasi" class="form-control" name="lokasi" placeholder="Lokasi Pernikahan (disertai kota)" aria-required="true" required>
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
                    </div></form>`;
            }
        }
      </script>
      </head>

    <body onload="start()">
        <?php include_once "navbar.php";?>

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
    <input type="hidden" name="_csrf" value="jdwIbDQwYoscgf9_f2BT2xmBiioJIpPYQPnC3Gx8NyS_6FsmewkD727ElwVPMWK6Q8nGXGhAy5sfl6i5HDtmHQ==">       
            <div class="container" style="margin-bottom:20px;">    
            <div style="text-align:left;">
            <div style="font-size:18px; margin-bottom:20px;">Ya, Saya siap:</div>
            <div class="form-group field-congregationalserviceform-checked_form">
              <div id="congregationalserviceform-checked_form" aria-invalid="false"><label id="checkmarklabel0" class="checkmark-custom">

<select name="formulir" id="formulir" onchange="pilihForm()" style="margin-bottom:20px">
    <option value="0">--Pilih Formulir--</option>
    <option value="1">Pelayanan</option>
    <option value="2">Baptisme</option>
    <option value="3">Komunitas Sel / CG</option>
    <option value="4">Pokok/Permohonan Doa</option>
    <option value="5">Kesaksian Pribadi</option>
    <option value="6">Pemberkatan Pernikahan</option>
</select>
<div class="checkmark-detail" id="ket"></div>
<br>
<div id="isiForm"></div>
        </div>
    </div>
    </div>
    </body>
   </head>
</html>