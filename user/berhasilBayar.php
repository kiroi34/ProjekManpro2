<!DOCTYPE html>
<html>
    <head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>Pembayaran Berhasil</title>

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

    </head>
    <body>
        <?php
            include_once "navbar.html";
            require_once "koneksi.php";

            $id = $_POST['id'];
            $nominal = $_POST['nominal'];

            $sql="UPDATE inputpenggalangandana SET terkumpul = terkumpul + " .$nominal.  " WHERE id='$id'";
            $sambung->query($sql);
        ?>

        <!--Navigation / Nav-->
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

                        <div class="container" style="text-align: center; margin-top: 3%;">
                            <i class="fas fa-check-circle fa-7x" style="color: green;"></i>
                            <h3 style="margin-top: 1%;">Pembayaran Sukses</h3>
                            <a href="daftarPenggalanganDana.php"><h6>Back to Home</h6></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Footer-->
        <p style="background-color:white; text-align: center; margin-top: 5%; outline-style: groove; padding: 20px;">Copyright © Paw Patrols</p>
    
        <!-- Bootstrap JS -->
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>