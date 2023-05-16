<!DOCTYPE html>
<html lang="en">
   <head>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <title>Hubungi Kami</title>

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
      <?php include_once "navbar.php" ?>
        <div id="mainContainer">
          <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
      <div style="padding-left:0; padding-right:0">
          <div style="width:100%;" class="mr-auto ml-auto">
              <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:20px;">
                  <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                      Contact Us             
                  </div>
                  <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                      Hubungi kami disini.            
                  </div>
              </div>
       <div>
        <div class="pt-4 pb-5">
            <div class="container">
              <div class="mb-3">
                <h1 id="contactus" class="text-center">Hubungi Kami</h1>
              </div>
              <div class="row">
                <div class="col-md-7">
                  <form id="w0" action="/" method="post">
          <input type="hidden" name="_csrf" value="rb9rhytDW-QKWACfwSr2TPLkVCywbQOxtcYla3tPr-LD5QrvbwApvEAIMan3eL4Ina0-HMosRZznpwheMAf91g==">        
          <div class="row">
          <div class="col-6">
          <div class="form-group field-contactform-name required">
          
          <input type="text" id="contactform-name" class="form-control" name="ContactForm[name]" placeholder="Nama" aria-required="true">
          
          <p class="help-block help-block-error"></p>
          </div>          </div>
          <div class="col-6">
          <div class="form-group field-contactform-email required error">
          
          <input type="text" id="contactform-email" class="form-control" name="ContactForm[email]" placeholder="E-mail" aria-required="true" aria-invalid="true">
          
          <p class="help-block help-block-error" style="font-size: medium;">* Email tidak boleh kosong.</p>
          </div>          
        </div>
          <div class="col-12">
          <div class="form-group field-contactform-subject required">
          
          <input type="text" id="contactform-subject" class="form-control" name="ContactForm[subject]" placeholder="Subject" aria-required="true">
          
          <p class="help-block help-block-error"></p>
          </div>          
        </div>
          <div class="col-12">
          <div class="form-group field-contactform-body required">
          
          <textarea id="contactform-body" class="form-control" name="ContactForm[body]" rows="10" placeholder="Pesan" aria-required="true"></textarea>
          
          <p class="help-block help-block-error"></p>
          </div>          </div>
                    <div class="col-12">
                        <button class="btn btn-danger" style="background-color: blue;">Kirim</button>
                    </div>
                  </div>
                  </form>      </div>
                <div class="col-md-5">
                  <div class="d-md-none mt-5"></div>
                  <h5 class="mb-3">Detail Gereja</h5>
                  <p>
                    <strong>Alamat</strong>
                    <br>
                    <a href="#map">Jalan Siwalankerto VIII Blok F no 40, Surabaya.</a>
                    <br><br>
                    <strong>Jam Operasional</strong>
                    <br>
                    Senin-Sabtu<br>
                    Open hours: 10.00-18.00 <br><br>
                    <strong>E-mail</strong>
                    <br>
                    <a href="gerejakita@gmail.com">gerejakita@gmail.com</a>
                    <br><br>
                    <a class="btn btn-danger" style="background-color: blue;" href="/locations">Lihat Lokasi Gereja</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
       </div>
        
    </body>
</html>