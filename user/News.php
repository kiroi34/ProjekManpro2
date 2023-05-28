<?php
        require_once 'koneksi.php';

        session_start();

        include_once "navbar.php";
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="eFnI7r69sRmjJ4WVIYs1pCAeux2VJAtUpBDAhbT2rLNKbZuk8YTQfdFi7e8R2gTFelb3a_RGUxf7fqrgxLH9ig==">
    <link href="https://gmschurch.azureedge.net/gmsbaratlandingpagedata/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">
    
    <style>
        body {
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

        .faq-heading{
            border-bottom: #777;
            padding: 20px 60px;
        }
        .faq-container{
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .hr-line{
            width: 60%;
            margin: auto;
        }
        /* Style the buttons that are used to open and close the faq-page body */
        .faq-page {
            /* background-color: #eee; */
            color: #444;
            cursor: pointer;
            padding: 30px 20px;
            width: 60%;
            border: none;
            outline: none;
            transition: 0.4s;
            margin: auto;
        }
        .faq-body{
            margin: auto;
            /* text-align: center; */
            width: 50%; 
            padding: auto;
        }
        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active,
        .faq-page:hover {
            background-color: #F9F9F9;
        }
        /* Style the faq-page panel. Note: hidden by default */
        .faq-body {
            padding: 0 18px;
            background-color: white;
            display: none;
            overflow: hidden;
        }
        .faq-page:after {
            content: '\02795';
            /* Unicode character for "plus" sign (+) */
            font-size: 13px;
            color: #777;
            float: right;
            margin-left: 5px;
        }
        .active:after {
            content: "\2796";
            /* Unicode character for "minus" sign (-) */
        }

        /* Style for the modal */
       .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        text-align: center;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.4);
       }

       .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%; 
       }

       

</style>
</style>
</head>

<body>
        
    <div id="mainContainer">
        <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
            <div style="padding-left:0; padding-right:0">
                <div style="width:100%;" class="mr-auto ml-auto">
                    <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:20px;">
                        <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                            Berita Terbaru           
                        </div>
                        <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                            Informasi dan Berita Terbaru Gereja           
                        </div>
                    </div>
                    <section id="berita-terbaru" style=" display: grid;grid-template-columns: repeat(3, 1fr); grid-gap: 20px; padding: 20px;">
    <article style="  border: 1px solid #ccc; padding: 10px;"> 
      <img src="assets/gambar-berita1.jpg" alt="Gambar Berita 1" style =" width: 100%; height: auto;">
      <div class="content">
        <h2 style=" margin-top: 10px; font-size:large"><b>Youth Camp Pemuda Pemudi 2023</b></h2>
        <p style="margin-bottom: 10px; font-size: medium">Kegiatan diadakan dengan total kurang lebih 80 jemaat dan berlangsung selama 3 hari 2 malam di kampung Wonosari, Jawa Barat<br></p>
        <!-- <a href="berita1.html" style=" display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
        text-decoration: none; transition: background-color 0.3s ease;">Baca selengkapnya</a> -->
        <!-- Button to open the modal -->
     <button style="display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
        text-decoration: none; transition: background-color 0.3s ease;" onclick="openModal()">Baca Selengkapnya</button>

        <!-- The modal -->
        <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
        <h2><b>Youth Camp Pemuda Pemudi 2023</b></h2>
        <p style="text-align:justify;">✨Kegiatan ini diadakan dengan total kurang lebih 80 jemaat dan berlangsung selama 3 hari 2 malam di kampung Wonosari, Jawa Barat.</p>
        <p style ="text-align:justify;">✨Kegiatan ini bertujuan untuk mengumpulkan dan melibatkan pemuda-pemudi dalam berbagai kegiatan yang bermanfaat. Peserta mengikuti serangkaian kegiatan asik dan menyenangkan seperti:<br> - diskusi <br> - lokakarya <br> - permainan <br> - kegiatan sosial.</p>
        <button onclick="closeModal()">Close</button>
        </div>
        </div>
    </div>
      
    </article>
    
    <article style="  border: 1px solid #ccc; padding: 10px;">
      <img src="assets/gambar-berita2.jpeg" alt="Gambar Berita 2" style =" width: 100%; height: auto;">
      <div class="content">
        <h2 style=" margin-top: 10px; font-size:large"><b>Senam Rutin Jemaat Gereja</b></h2>
        <p style="margin-bottom: 10px; font-size: medium">Kegiatan rutin dalam rangka mempererat tali persaudaraan dalam Tuhan, berlangsung setiap : <br> Hari : Jumat <br> Pukul : 09.00 WIB <br> Lokasi: Aula Gereja<br><br>Terbuka untuk seluruh jemaat gereja , SALAM SEHAT.😍 </p>
        <!-- <a href="berita2.html" style=" display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
        text-decoration: none; transition: background-color 0.3s ease; :hover">Baca selengkapnya</a> -->

        <!-- Button to open the modal -->
     <button style="display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
        text-decoration: none; transition: background-color 0.3s ease;" onclick="openModal2()">Baca Selengkapnya</button>

        <!-- The modal -->
        <div id="myModal2" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
        <h2><b>Senam Rutin Jemaat Gereja</b></h2>
        <p style="text-align:justify;">Kegiatan rutin ini seru banget loh dipimpin oleh Bapak/Ibu Pendeta kita dalam rangka mempererat tali persaudaraan dalam Tuhan. </p>
        <p style="text-align:justify;">Informasi : <br> 📣Kegiatan ini berlangsung setiap Jumat pukul 09.00 WIB di Aula Gereja.</p>
        <p style="text-align:justify;">📣Kegiatan ini terbuka untuk seluruh jemaat gereja. Ayo bergabung <br>bersama kita, SEHAT SEHAT SEHAT👍</p>
        <button onclick="closeModal2()">Close</button>
        </div>
        </div>
      </div>
    </article>
    
    <article style="  border: 1px solid #ccc; padding: 10px;">
      <img src="assets/gambar-berita3.jpg" alt="Gambar Berita 3" style =" width: 100%; height: auto;">
      <div class="content">
        <h2 style=" margin-top: 10px; font-size:large"><b>Latihan Musik dan PAW untuk Ibadah Youth</b></h2>
        <p style="margin-bottom: 10px; font-size: medium">Latihan dilakukan untuk yang bertugas dalam ibadah pemuda pemudi yaitu WL, pemusik, singer, kolektan, operator.<br> Info Latihan : Hari Kamis 19.00-selesai <br> Lokasi : Gereja</p>
        <!-- <a href="keluar.php" style=" display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
        text-decoration: none; transition: background-color 0.3s ease;">Baca selengkapnya</a> -->

        <!-- Button to open the modal -->
     <button style="display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
        text-decoration: none; transition: background-color 0.3s ease;" onclick="openModal3()">Baca Selengkapnya</button>

        <!-- The modal -->
        <div id="myModal3" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
        <h2><b>Latihan Musik dan PAW untuk Ibadah Youth</b></h2>
        <p style="text-align:justify;">Latihan ini dilakukan untuk para anggota yang bertugas dalam ibadah pemuda pemudi, seperti WL (<i>Worship Leader</i>), pemusik, <i>singer</i>, kolektan, dan operator.</p>
        <p style="text-align:justify;">Info Latihan: </p>
        <ul>
        <li style="text-align:left">Hari: Kamis</li>
        <li style="text-align:left">Waktu: 19.00 - Selesai</li>
        <li style="text-align:left">Lokasi: Gereja</li>
       </ul>
        <p style="text-align:justify;">Para anggota yang terlibat dalam ibadah youth diharapkan untuk mengikuti latihan ini. Ayo bergabung dan tingkatkan kemampuan musik dan pelayanan Anda! Tuhan Yesus Memberkati🙏</p>
        <button onclick="closeModal3()">Close</button>
        </div>
        </div>
    </div>
      </div>
    </article>

  </section>

                    <?php
                        // $query = "SELECT id, kategori.namaKategori, judul, konten, tanggal, gambar
                        // FROM berita INNER JOIN kategori
                        // ON kategori.idKategori=berita.kategori";
                        // $result = $sambung->query($query);
                        
                        // if ($result->num_rows>0) {
                        //     while($row = $result->fetch_assoc()){
                        //         $id=$row['id'];
                        //         echo "<section class='faq-container'>";
                        //             echo "<div class='faq-one'>";
                        //                 echo "<h1 class='faq-page'style='font-size:larger;'><b>" . $row['namaKategori'] . ": </b>" . $row['judul'] . "</h1>";
                        //                 echo "<div class='faq-body'>";
                        //                     echo "<p style='font-size: medium;'>" . $row['konten'] . "<br>" . $row['tanggal'] . "</p>";
                        //                     echo "<img src='../admin/img/" . $row["gambar"] . "' height='400'>";
                        //                 echo "</div>"; 
                        //             echo "</div>";                
                        //         echo "</section>";
                        //     }
                        // }
                    ?>
    
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
    <script>
        // var faq = document.getElementsByClassName("faq-page");
        // var i;

        // for (i = 0; i < faq.length; i++) {
        //     faq[i].addEventListener("click", function () {
        //         this.classList.toggle("active");
        //         var body = this.nextElementSibling;
        //         if (body.style.display === "block") {
        //             body.style.display = "none";
        //         } else {
        //             body.style.display = "block";
        //         }
        //     });
        // }
        
    // Function to open the modal
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function openModal2() {
      document.getElementById("myModal2").style.display = "block";
    }

    function openModal3() {
      document.getElementById("myModal3").style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    function closeModal2() {
      document.getElementById("myModal2").style.display = "none";
    }

    function closeModal3() {
      document.getElementById("myModal3").style.display = "none";
    }
    </script>
</body>
</html>