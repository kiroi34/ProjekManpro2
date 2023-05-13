<!DOCTYPE html>
<html lang="en">
  <head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>Pembayaran Donasi</title>

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

    <?php
      include_once "navbar.html";
    ?>
  </head>

  <body>
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

              <div class="container">
                <div class="panel">
                  <div class="row">
                    <div class="col-12 text-left" style="background-color:white;border-bottom:3px solid #ccc;">
                      <div class="nav-link">
                        <div id="giveContent_8f4c6a26b91c743ac3168a8f7c022e2b" class="tabcontent tabcontent_8f4c6a26b91c743ac3168a8f7c022e2b">
                          
                          <div class="row align-items-center mt-2 bank-account-wrapper">
                            <div class="col-8" style="padding-right:5px; margin-top : 50px">
                              
                                <div style="font-size:1.2em;line-height:1em; width:max-content; margin-left: 50px;">
                                  <b>Gereja Kristen Indonesia</b>
                                </div>
                                <br>
                                <div style="font-size:13px; margin-left:50px; font-size:15px;">
                                  <b>GEREJA Kristen Lorum</b>
                                </div>
                                <br>

                                <div class="copy-to-clipboard" data-placement="bottom" title="Copied" data-clipboard-text="0882977771">
                                  <b style="font-size:1.3em;line-height:1.3em; margin-left: 50px; background-color: lightgray;">
                                    <a href="javascript:void(0)">BCA 081.2.3456.0</a>
                                  </b>
                                  <span data-placement="bottom" style="background-color:red" data-clipboard-text="0882977771" class="badge badge-secondary copy-to-clipboard" title="Copied">COPY</span>
                                </div>
                                <div class="mt-2" style="font-size:0.8em; margin-top:50px; margin-left: 50px;">
                                  Scan QR Code dengan aplikasi berikut ini:
                                </div>
                                <div class="mt-2" style="margin-top:50px; margin-left: 50px;">
                                  <img loading="lazy" src="https://gmschurch.azureedge.net/gmsbaratlandingpagedata/images/mobile-payment-apps-icon.png" alt="QR" height="30">
                                  <br><br>

                                  <?php
                                    require_once "koneksi.php";
                                    $id = $_GET['id'];
                                  ?>
                                            
                                  <!-- Buat Input Nominal Pemberian buat masuk ke database -->
                                  <form method="post" action="metodebayar.php" style="width: 30%;">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text">Rp. </span>

                                      <label for="nominal"></label>
                                      <input type="text" id="nominal" name="inputNominal" class="form-control" placeholder="0" >
                                      
                                      <?php
                                        echo '<input type="hidden" name="id" value="'. $id .'">';
                                      ?>
                                      <br>
                                    </div>
                                    <!-- <a href="berhasilBayar.php"> -->
                                      <button type="submit" class="btn btn-primary btn-lg">Bayar</button>
                                  </form>
                                </div>
                              </div>

                              <div class="col-4" style="padding-left:5px;">
                                <div class="mt-2 give-qrcode-image active">
                                  <img loading="lazy" src="assets/QRcode.png" alt="QR" style="max-width:170px;width:100%;">
                                </div>
                              </div>
                              <div class="col-12 mt-4" style="padding-right:5px">
                                <div class="form-group field-congregationalserviceform-news_category">
                              </div>      
                              
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
    </div>
  </body>
</html>