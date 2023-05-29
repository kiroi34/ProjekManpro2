<?php
    require_once 'koneksi.php';
    session_start();
    // if (!isset($_SESSION['gereja'])) {
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
        // } 
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

                    <!-- <section id="berita-terbaru" style=" display: grid;grid-template-columns: repeat(3, 1fr); grid-gap: 20px; padding: 20px;">
                        <article style="  border: 1px solid #ccc; padding: 10px;"> 
                            <img src="assets/gambar-berita1.jpg" alt="Gambar Berita 1" style =" width: 100%; height: auto;">
                            <div class="content">
                            <h2 style=" margin-top: 10px; font-size:large"><b>Youth Camp Pemuda Pemudi 2023</b></h2>
                            <p style="margin-bottom: 10px; font-size: medium">Kegiatan diadakan dengan total kurang lebih 80 jemaat dan berlangsung selama 3 hari 2 malam di kampung Wonosari, Jawa Barat<br></p>
                            <button style="display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
                            text-decoration: none; transition: background-color 0.3s ease;" onclick="openModal()">Baca Selengkapnya</button>

                            The modal -->
                            <!-- <div id="myModal" class="modal"> -->
                                <!-- Modal content -->
                                <!-- <div class="modal-content">
                                    <h2><b>Youth Camp Pemuda Pemudi 2023</b></h2>
                                    <p style="text-align:justify;">✨Kegiatan ini diadakan dengan total kurang lebih 80 jemaat dan berlangsung selama 3 hari 2 malam di kampung Wonosari, Jawa Barat.</p>
                                    <p style ="text-align:justify;">✨Kegiatan ini bertujuan untuk mengumpulkan dan melibatkan pemuda-pemudi dalam berbagai kegiatan yang bermanfaat. Peserta mengikuti serangkaian kegiatan asik dan menyenangkan seperti:<br> - diskusi <br> - lokakarya <br> - permainan <br> - kegiatan sosial.</p>
                                    <button onclick="closeModal()">Close</button>
                                </div>
                            </div>                        
                        </article>
                    </section> -->

                    <section id="berita-terbaru" style=" display: grid;grid-template-columns: repeat(3, 1fr); grid-gap: 20px; padding: 20px;">

                    <?php
                        $query = "SELECT id, kategori.namaKategori, judul, rangkuman, konten, tanggal, gambar
                        FROM berita INNER JOIN kategori
                        ON kategori.idKategori=berita.kategori WHERE idgereja=".$_SESSION['gereja'];
                        $result = $sambung->query($query);
                        
                        if ($result->num_rows>0) {
                            while($row = $result->fetch_assoc()){
                                $id=$row['id'];
                                $rangkum = str_replace(array("\n"), array("<br>"), $row['rangkuman']);
                                $isi = str_replace(array("\n"), array("<br>"), $row['konten']);

                            echo '
                                    <article style="  border: 1px solid #ccc; padding: 10px;"> 
                                        <img src="../admin/img/' . $row["gambar"] . '" alt="Gambar Berita 1" style =" width: 100%; height: auto;">
                                        <div class="content">
                                        <h2 style=" margin-top: 10px; font-size:large"><b>' . $row['judul'] . '</b></h2>
                                        <p style="margin-bottom: 10px; font-size: medium">' . $rangkum .'<br></p>
                                        <button style="display: block;text-align: center;padding: 10px;background-color: #333;color: #fff;
                                        text-decoration: none; transition: background-color 0.3s ease;" onclick="openModal('.$id.')">Baca Selengkapnya</button>

                                        <!-- The modal -->
                                        <div id="'.$id.'" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <h2><b>' . $row['judul'] . '</b></h2>
                                                <p style="text-align:justify;">' . $isi . '</p>
                                                <button onclick="closeModal('.$id.')">Close</button>
                                            </div>
                                        </div>                        
                                    </article>
                                ';
                            }
                        }
                    ?>
                    </section>
    
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
    <script>
        // Function to open the modal
        function openModal(id) {
        document.getElementById(id).style.display = "block";
        }

        // Function to close the modal
        function closeModal(id) {
        document.getElementById(id).style.display = "none";
        }
    </script>
</body>
</html>