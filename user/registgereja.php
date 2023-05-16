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
                background: #c1c1c1;
            }

            input[type=text]:focus, input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit button */
            .btn {
                background-color: white;
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
                text-align: center;
                padding: 3px;
                background-color: DarkSalmon;
                color: white;
            }
        </style>
    </head>
    
    <body>
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

                                <!-- FORMULIR -->
                                <form id="formulir" action="registgereja_proses.php" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
                                    <input type="hidden" name="_csrf" value="jdwIbDQwYoscgf9_f2BT2xmBiioJIpPYQPnC3Gx8NyS_6FsmewkD727ElwVPMWK6Q8nGXGhAy5sfl6i5HDtmHQ==">       
                                    
                                    <div class="container" style="margin-bottom:20px;">    
                                        <div style="text-align:left;">
                                            <div class="form-group field-congregationalserviceform-checked_form">
                                                <div id="congregationalserviceform-checked_form" aria-invalid="false">
                                                    <label id="checkmarklabel0" class="checkmark-custom">

                                                        <!-- Bikin Background Form -->
                                                        <div id="acceptJesusInfo" class="container" style="margin-bottom: 20px; margin-left:52px;">
                                                            <div style="background-image:url('https://userscontent2.emaze.com/images/f9d0caa4-73e5-4bb5-a4f0-772c237fe09b/c97065c5452e8d5aaacd9ce51d64ff8d.png'); background-repeat:no-repeat; background-position:center; background-size:cover; background-color:#1C1C1C; border-radius:10px; padding:20px;">

                                                                <!-- FORM 1 : Registrasi Gereja -->
                                                                <div style="font-size:18px; margin-bottom:15px; color:black; text-align:center; background-color: white;">
                                                                    <b>Registrasi Gereja </b>
                                                                </div>
                                                                <div id="form">
                                                                    <div class="container" style="margin-bottom:20px;">
                                                                        <div style="background-color:black; border-radius:10px; padding:20px;">
                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:white; text-align:left; font-size: medium;">
                                                                                <b>Silahkan isi form dibawah ini dengan sungguh-sungguh:</b> 
                                                                            </div>

                                                                            <input type="hidden" id="congregationalserviceform-tag" name="CongregationalServiceForm[tag]">     
                                                                            
                                                                            <!-- Nama Gereja -->
                                                                            <div class="form-group field-nameField">
                                                                                <input type="tel" id="nama" class="form-control" name="nama" maxlength="50" placeholder="Nama Gereja">
                                                                            </div> 

                                                                            <!-- Email -->
                                                                            <div class="form-group field-emailField">
                                                                                <input type="tel" id="email" class="form-control" name="email" maxlength="50" placeholder="Email">
                                                                            </div> 

                                                                            <!-- Jam Operasional Gereja -->
                                                                            <div class="form-group field-jamField">
                                                                                <input type="tel" id="jamoperasional" class="form-control" name="jamoperasional" maxlength="50" placeholder="Jam Operasional Gereja">
                                                                            </div>

                                                                            <!-- Kota -->
                                                                            <div class="form-group field-kotaField">
                                                                                <input type="tel" id="kota" class="form-control" name="kota" maxlength="50" placeholder="Kota">
                                                                            </div>

                                                                            <!-- Alamat Lengkap Gereja -->
                                                                            <div class="form-group field-addressField">
                                                                                <input type="tel" id="alamat" class="form-control" name="alamat" maxlength="50" placeholder="Alamat Gereja">
                                                                            </div>

                                                                            <br>

                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:white; text-align:left; font-size: medium;">
                                                                                <b>Silahkan isi detail informasi gereja : </b>
                                                                            </div>

                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:grey; text-align:left; font-size: medium;">
                                                                                <b>Informasi umum gereja : </b>
                                                                            </div>

                                                                            <!-- Tentang Gereja -->
                                                                            <div class="form-group field-aboutusField">
                                                                                <input type="tel" id="tentang" class="form-control" name="tentang" maxlength="50" placeholder="Tentang Gereja">
                                                                            </div>

                                                                            <!-- Visi Misi Gereja -->
                                                                            <div class="form-group field-visimisiField">
                                                                                <input type="tel" id="visimisi" class="form-control" name="visimisi" maxlength="50" placeholder="Visi & Misi Gereja">
                                                                            </div>

                                                                            <!-- Mengenai Pendeta Gereja -->
                                                                            <div class="form-group field-pendetaField">
                                                                                <input type="tel" id="informasipendeta" class="form-control" name="informasipendeta" maxlength="50" placeholder="Informasi Pendeta">
                                                                            </div>
                                                                            
                                                                            <br>

                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:grey; text-align:left; font-size: medium;">
                                                                                <b>Informasi pelengkap gereja : </b>
                                                                            </div>

                                                                            <!-- FAQ Gereja -->
                                                                            <div class="form-group field-FAQField">
                                                                                <input type="tel" id="pertanyaanfaq" class="form-control" name="pertanyaanfaq" maxlength="50" placeholder="FAQ Seputar Gereja">
                                                                            </div>

                                                                            <div class="form-group field-jawabanFAQField">
                                                                                <input type="tel" id="jawabanfaq" class="form-control" name="jawabanfaq" maxlength="50" placeholder="Jawaban FAQ Gereja">
                                                                            </div>

                                                                            <br>

                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:grey; text-align:left; font-size: medium;">
                                                                                <b>Informasi/berita terbaru gereja : </b>
                                                                            </div>

                                                                            <!-- NEWS Gereja -->
                                                                            <!-- Kategori Berita -->
                                                                            <div class="form-group field-congregationalserviceform-news_category">
                                                                                <select id="kategoriberita" class="form-control" name="kategoriberita" onchange="upload_checkbox()">
                                                                                    <option value="kategoriberita">--Pilih Kategori Berita--</option>
                                                                                    <?php
                                                                                        require_once 'koneksi.php';

                                                                                        $sql = "SELECT * FROM kategoriberita";
                                                                                        $result = $sambung->query($sql);

                                                                                        if ($result->num_rows > 0) {
                                                                                            while($data = $result->fetch_assoc()) {
                                                                                            echo "<option value='" . $data['id'] . "'>" . $data['namaKategoriBerita'] . "</option>";
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group field-judulberitaField">
                                                                                <input type="tel" id="judulberita" class="form-control" name="judulberita" placeholder="Judul Berita">
                                                                            </div>

                                                                            <div class="form-group field-kontenberitaField">
                                                                                <input type="tel" id="kontenberita" class="form-control" name="kontenberita" placeholder="Konten Berita">
                                                                            </div>

                                                                            <form action="/action_page.php">
                                                                                <label for="tanggal" style="color: white; font-family: Poppins; font-size: medium;">Tanggal Berita:</label>
                                                                                <input type="date" id="tanggalkonten" name="tanggalkonten" style="font-size: medium;">
                                                                            </form>

                                                                            <br>
                                                                            <br>

                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:grey; text-align:left; font-size: medium;">
                                                                                <b>Informasi Kebutuhan Persembahan : </b>
                                                                            </div>

                                                                            <!-- Rekening persembahan -->
                                                                            <div class="form-group field-rekeningField">
                                                                                <input type="tel" id="rekeningpersembahan" class="form-control" name="rekeningpersembahan" placeholder="Rekening Kebutuhan Persembahan Jemaat">
                                                                            </div>

                                                                            <!-- Checkbox ada Qris gereja atau tidak  -->
                                                                            <label class="checkbox-label-custom">
                                                                                <input id="upload_checkbox" type="checkbox" class="check-join-cg check-checkmark" value="1" tabindex="3">
                                                                                <span class="checkbox-span" style="margin-left:12px; margin-top:-15px; background-color:transparent;"></span>
                                                                            </label>
                                                                            <span style="margin-left:20px; top:-2px; right:25px;position:relative; font-size: medium; color: white;">
                                                                                Ada Qris untuk Persembahan
                                                                            </span>

                                                                            <div id="upload_form" style="display: none;">
                                                                                <div class="form-group">
                                                                                    <label for="poster">Klik tombol <i>"Choose File"</i> untuk upload sebuah file (jpg/jpeg/png):</label>
                                                                                    <br>
                                                                                    <input type="file" id ="fotopersembahan" accept="image/png, image/jpg, image/jpeg, image/PNG, image/JPG, image/JPEG" name="fotopersembahan" default = 0>
                                                                                </div>
                                                                            </div>

                                                                            <script>
                                                                                const checkbox = document.querySelector('#upload_checkbox');
                                                                                const uploadForm = document.querySelector('#upload_form');

                                                                                checkbox.addEventListener('change', () => {
                                                                                    if (checkbox.checked) {
                                                                                        uploadForm.style.display = 'block';
                                                                                    } else {
                                                                                        uploadForm.style.display = 'none';
                                                                                    }
                                                                                });
                                                                            </script>

                                                                            <br>

                                                                            <div style="font-size:12px; margin-top:-3px; margin-bottom:20px; color:grey; text-align:left; font-size: medium;">
                                                                                <b>Informasi Kontak Penanggung Jawab gereja : </b>
                                                                            </div>

                                                                            <!-- Nama Penanggung Jawab -->
                                                                            <div class="form-group field-nameCP">
                                                                                <input type="tel" id="namacp" class="form-control" name="namacp" placeholder="Nama Penanggung Jawab">
                                                                            </div>

                                                                            <div class="form-group field-notelpCP">
                                                                                <input type="tel" id="kontakcp" class="form-control" name="kontakcp" placeholder="Email/Nomor Telepon CP">
                                                                            </div>

                                                                            <div class="form-group field-nikpCP">
                                                                                <input type="tel" id="nikcp" class="form-control" name="nikcp" placeholder="NIK CP">
                                                                            </div>

                                                                            <br>

                                                                            <!-- Kalimat Tambahan  -->
                                                                            <div id="penutupInfoWrapper" style="display: block; font-size: medium; text-align: center">
                                                                                <b>Terima Kasih Atas Pengisian Form Registrasi Gereja</b>
                                                                            </div> 

                                                                            <br>
                                                                        </div>          

                                                                        <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="font-size:18px; letter-spacing:4px; border:0; background-color:white; color:black;">
                                                                            <input type="submit" name="submit" value="Submit"></input>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>