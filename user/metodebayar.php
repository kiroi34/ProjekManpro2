<!DOCTYPE html>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
            
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-param" content="_csrf">
        <meta name="csrf-token" content="eFnI7r69sRmjJ4WVIYs1pCAeux2VJAtUpBDAhbT2rLNKbZuk8YTQfdFi7e8R2gTFelb3a_RGUxf7fqrgxLH9ig==">

        <link href="https://gmschurch.azureedge.net/gmsbaratlandingpagedata/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">
        <title>Metode Pembayaran</title>
            
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

            .card {
                border-radius: 4px;
                background: #fff;
                box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
                transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
                padding: 14px 80px 18px 36px;
                cursor: pointer;
            }

            .card:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
            }

            .card h3 {
                font-weight: 600;
            }

            .card img {
                position: absolute;
                top: 20px;
                right: 15px;
                max-height: 120px;
            }


            @media(max-width: 990px) {
                .card {
                    margin: 20px;
                }
            }

            .container {
                display: block;
                position: relative;
                padding-left: 35px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 22px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .container input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            .checkmark {
                position: absolute;
                top: 0;
                left: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }

            .container:hover input~.checkmark {
                background-color: #ccc;
            }

            .container input:checked~.checkmark {
                background-color: #2196F3;
            }

            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }

            .container input:checked~.checkmark:after {
                display: block;
            }

            .container .checkmark:after {
                top: 9px;
                left: 9px;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: white;
            }

            form {
                text-align: center;
                align-content: space-between;
            }

            .iniBtn {
                width: 10%;
                height: 40px;
                border: none;
                border-radius: 15px;
                margin: 0.5em 0;
                /* transform: translate(-1%); */
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
        <?php
            include_once "navbar.html";
            require_once 'koneksi.php';
            $id = $_POST['id'];
            $nominal = $_POST['inputNominal'];
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

                        <div>
                            <ul id="navGive" class="nav nav-pills nav-fill text-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active " style="background-color: blue;" id="bank-transfer-tab" data-toggle="tab" role="tab" href="#bank-transfer">
                                    Bank Transfer &amp; QRIS
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="container">
                            <div class="panel">
                                <div class="row">
                                    <div class="col-12 text-left" style="background-color:white;border-bottom:3px solid #ccc;">
                                        <div class="nav-link">
                                            <div id="giveContent_8f4c6a26b91c743ac3168a8f7c022e2b" class="tabcontent tabcontent_8f4c6a26b91c743ac3168a8f7c022e2b">
                                                <div class="row align-items-center mt-2 bank-account-wrapper">
                                                    <div class="col-8" style="padding-right:5px; margin-top : 50px">
                                                        <br>
                                                    </div>
                                                </div>

                                                <h1 style="text-align: center;">Pilih Metode Pembayaran</h1>
                                                <br>

                                                <?php
                                                    $sql = "SELECT * FROM metodepembayaran";
                                                    $result = $sambung->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo '<div class="text-center">
                                                                    <div class="row" style="margin-left: 25%; margin-right: 25%;">
                                                                        <div class="col">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <label class="container">'.$row["metodeBayar"].'
                                                                                        <input type="radio" name="radio">
                                                                                        <span class="checkmark"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                        }
                                                    } else {
                                                        echo "Data tidak ditemukan";
                                                    }
                                                ?>
                                                
                                                <br>

                                                <div class="col-md-12 text-center">
                                                    <form method="post" action="berhasilBayar.php">
                                                        <?php
                                                            echo '<input type="hidden" name="id" value="' . $id . '">';
                                                            echo '<input type="hidden" name="nominal" value="' . $nominal . '">';
                                                        ?>
                                                        <button type="submit" class="btn btn-primary btn-lg">Bayar</button>
                                                    </form>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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