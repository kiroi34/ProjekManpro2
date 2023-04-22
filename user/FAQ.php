<!DOCTYPE html>
<html lang="en">
   <head>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

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
}
      </style>
      <?php include_once "navbar.html" ?>

        <div id="mainContainer">
          <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
      <div style="padding-left:0; padding-right:0">
          <div style="width:100%;" class="mr-auto ml-auto">
              <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:20px;">
                  <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                      FAQ            
                  </div>
                  <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                      Pertanyaan dan Jawaban seputar Gereja.            
                  </div>
              </div>
       <div>
            <section class="faq-container">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page"style="font-size:larger;"><b>Ada dimana aja lokasi gereja ini?</b></h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p style="font-size: medium;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-two">
                    <!-- faq question -->
                    <h1 class="faq-page"style="font-size:larger;"><b>Kapan Kebaktian Umum dilaksanakan?</b></h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p style="font-size: medium;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-three">
                    <!-- faq question -->
                    <h1 class="faq-page" style="font-size:larger;"> <b>Jam berapa ibadah dilakukan?</b></h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p style="font-size: medium;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-three">
                    <!-- faq question -->
                    <h1 class="faq-page" style="font-size:larger;"> <b>Kapan Youth camp diadakan kembali?</b></h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p style="font-size: medium;">Consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
            </section>
        </main>
    </body>
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