<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <title>Daftar Penggalangan Dana</title>

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
        <?php
            include_once "navbar.html";
            require_once "koneksi.php";
        ?>

        <div id="mainContainer">
            <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
                <div style="padding-left:0; padding-right:0">
                    
                    <div style="width:100%;" class="mr-auto ml-auto">
                        <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:20px;">
                            <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                                Persembahan / Penggalangan Dana               
                            </div>
                            <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                                Memberi yang terbaik kepada Tuhan.             
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                      <div class="row">
                        <?php
                          $kalimatquery = "SELECT id, kategori.namaKategori, judul, deskripsi, deadline, terkumpul, target, poster
                                            FROM inputpenggalangandana INNER JOIN kategori
                                            ON kategori.idKategori=inputpenggalangandana.kategori";
                          $hasilquery = $sambung->query($kalimatquery);

                          if ($hasilquery->num_rows>0) {
                            while($row = $hasilquery->fetch_assoc()){
                              $id=$row['id'];
                              echo "<div class='col-md-4 border'>";
                                echo "<div class='text-center'>";
                                  echo "<a href='pilihPenggalanganDana.php?id=". $row["id"] ."'>
                                    <img src='../admin/poster/". $row['poster'] ."' style='max-height: 100%; width: 300px;' class='img-fluid'>
                                  </a>";
                                echo "</div>";

                                echo "<h5>". $row['namaKategori']." </h4>";
                                echo "<h4>". $row['judul']." </h4>";
                                echo "<p>". $row['deskripsi']." </p>";
                                
                                if ($row['target'] != 0){
                                  echo "<p>Deadline: ". $row['deadline']." </p>";

                                  echo "<div class='progress'>";
                                    $persentasiDonasi = $row["terkumpul"] / $row["target"] * 100;
                                    echo '<div class="progress-bar progress-bar-success" role="progressbar" style="width: ' .$persentasiDonasi .'%" aria-valuenow="' .$persentasiDonasi.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                  echo "</div>";

                                  echo '<div class="row">';
                                    echo '<div class="col">';
                                      echo '<p class="text-left">Rp. ' . number_format($row["terkumpul"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="col">';
                                      echo '<p class="text-right">Rp. ' . number_format($row["target"]) . '</p>';
                                    echo '</div>';
                                  echo '</div>';

                                } else {
                                    echo '<p class="text-left">Terkumpul: Rp. ' . number_format($row["terkumpul"]) . '</p>';
                                }

                              echo "</div>";
                            }
                          }
                        ?>
                      </div>
                    </div>
                    
                  </div>
                </div>
            </div>
        </div>
    </body>