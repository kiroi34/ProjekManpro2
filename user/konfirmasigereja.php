<?php
  if (isset($_SESSION['masuk'])){
    header("location:Homeuser.php");
  }
?>

<!DOCTYPE html>
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

        /* Set a style for the submit button */
        .btn {
            background-color: blue;
            color: white;
            padding: 18px 20px;
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
                            Terima kasih telah mengisi form tersebut. Tuhan Yesus Memberkati.              
                        </div>
                    </div>
                    <div class="container" style="text-align: center; margin-top: 3%;">
                            <i class="fas fa-check-circle fa-7x" style="color: green;"></i>
                            <br><br>
                            <h3 style="margin-top: 1%;">Permintaan Anda sudah terkirim.</h3>
                            <h3 style="margin-top: 1%;">Silakan tunggu 3-7 hari dan cek email Anda secara berkala</h3>
                            <br>
                            <a href="Homeuser.php"><h5><u>Back to Home</u></h5></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>