<!DOCTYPE html>
<html>
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

        <title>Penggalangan Dana yang Dipilih</title>

        <style>
            .nav-link.disable {
                color: grey;
            }

            .iniBtn {
                width: 10%;
                height: 40px;
                border: none;
                border-radius: 15px;
                margin: 0.5em 0;
                cursor: pointer;
                color: white;
                background: linear-gradient(to right, #64f0f5, #1590b6);
                transition: all .4s;
                margin-top: 1px;
                margin-left: 5px;
            }

            .iniBtn:hover {
                transform: translate(-1%, 5%);
                box-shadow: 0 0 10px #ff416d65;
            }
            
        </style>
    </head>

    <body>
        <!--Navigation / Nav-->
        <?php
            require_once 'koneksi.php';
            include_once 'navbar.html';

            $id = $_GET['id'];
            $kalimatQuery = "SELECT * FROM inputpenggalangandana WHERE id=" . $id;
            $hasilQuery = $sambung->query($kalimatQuery);

            $row = mysqli_fetch_array($hasilQuery);
            $persentasiDonasi = $row["terkumpul"] / $row["target"] * 100;

            
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

                        <div class="container">
                            <div style="text-align: center;">
                                <svg width="1100" height="110">
                                    <?php
                                    echo '<h3 class="text-center">' . $row["judul"] . '</h3>';
                                        echo '<img src="../admin/poster/'. $row["poster"] .'" style="width: 50%;">';
                                    ?>
                                </svg>
                            </div>

                            <br><br>

                            <h4>Deskripsi</h4>
                            <?php
                                echo $row["deskripsi"];
                            ?>

                            <br><br>

                            <h4>Donasi Terkumpul</h4>

                            <div class="progress" style="height: 50px;">
                                <?php
                                echo '<div class="progress-bar progress-bar-success" role="progressbar" style="width: ' . $persentasiDonasi . '%" aria-valuenow="' . $persentasiDonasi . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                ?>
                            </div>

                            <?php
                                echo '<div class="row">';
                                    echo '<div class="col">';
                                        echo '<h4 class="text-left">Rp. ' . number_format($row["terkumpul"]) . '</h4>';
                                    echo '</div>';
                                
                                    echo '<div class="col">';
                                        echo '<h4 class="text-right">Rp. ' . number_format($row["target"]) . '</h4>';
                                    echo '</div>';
                                echo '</div>';
                            ?>

                            <div class="text-center">
                                <?php
                                    echo '<a href="Persembahan.php?id=' . $id . '"><button class="iniBtn" style="margin-top: 3%;">Donasi</button></a>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js"></script>
    </body>

</html>