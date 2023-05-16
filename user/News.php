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
    </style>
</head>

<body>

    <?php
        require_once 'koneksi.php';

        session_start();

        include_once "navbar.php";
    ?>

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

                    <?php
                        $query = "SELECT * FROM berita";
                        $result = $sambung->query($query);
                        
                        if ($result->num_rows>0) {
                            while($row = $result->fetch_assoc()){
                                $id=$row['id'];
                                echo "<section class='faq-container'>";
                                    echo "<div class='faq-one'>";
                                        echo "<h1 class='faq-page'style='font-size:larger;'><b>" . $row['kategori'] . ": </b>" . $row['judul'] . "</h1>";
                                        echo "<div class='faq-body'>";
                                            echo "<p style='font-size: medium;'>" . $row['konten'] . "<br>" . $row['tanggal'] . "</p>";
                                            echo "<img src='../admin/img/" . $row["gambar"] . "' height='400'>";
                                        echo "</div>"; 
                                    echo "</div>";                
                                echo "</section>";
                            }
                        }
                    ?>
    
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>
</body>
</html>