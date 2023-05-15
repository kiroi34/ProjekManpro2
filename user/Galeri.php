<!DOCTYPE html>
<html lang="en">
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
        article {
                --img-scale: 1.001;
                --title-color: black;
                --link-icon-translate: -20px;
                --link-icon-opacity: 0;
                position: relative;
                border-radius: 16px;
                box-shadow: none;
                background: #fff;
                transform-origin: center;
                transition: all 0.4s ease-in-out;
                overflow: hidden;
              }
              
              article a::after {
                position: absolute;
                inset-block: 0;
                inset-inline: 0;
                cursor: pointer;
                content: "";
              }
              
              /* basic article elements styling */
              article h2 {
                margin: 0 0 18px 0;
                font-family: "Bebas Neue", cursive;
                font-size: 1.9rem;
                letter-spacing: 0.06em;
                color: var(--title-color);
                transition: color 0.3s ease-out;
              }
              
              figure {
                margin: 0;
                padding: 0;
                aspect-ratio: 16 / 9;
                overflow: hidden;
              }
              
              article img {
                max-width: 100%;
                transform-origin: center;
                transform: scale(var(--img-scale));
                transition: transform 0.4s ease-in-out;
              }
              
              .article-body {
                padding: 24px;
              }
              
              article a {
                display: inline-flex;
                align-items: center;
                text-decoration: none;
                color: #28666e;
              }
              
              article a:focus {
                outline: 1px dotted #28666e;
              }
              
              article a .icon {
                min-width: 24px;
                width: 24px;
                height: 24px;
                margin-left: 5px;
                transform: translateX(var(--link-icon-translate));
                opacity: var(--link-icon-opacity);
                transition: all 0.3s;
              }
              
              /* using the has() relational pseudo selector to update our custom properties */
              article:has(:hover, :focus) {
                --img-scale: 1.1;
                --title-color: #28666e;
                --link-icon-translate: 0;
                --link-icon-opacity: 1;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
              }
              
              *,
              *::before,
              *::after {
                box-sizing: border-box;
              }
              
              .articles {
                display: grid;
                max-width: 1200px;
                margin-inline: auto;
                padding-inline: 24px;
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                gap: 24px;
              }
              /* main{
			width: 100%;
			height: 400px;
			margin: 200px auto;
			overflow: hidden;
			position: relative;
		}
		h1{
			width: 98%;
			margin: 10px auto;
			background: #1976D2;
			font-weight: bold;
			color: white;
		}
    span{
			position: absolute;
		    top: 40%;
		    font-size: 60px;
		    font-weight: bold;
		    color: rgb(249, 0, 0);
		    cursor: pointer;
		    left: .5%;
		    z-index: 1;
		}
		span:nth-of-type(2){
			left: 98%;
			text-align: right;
		}
		section{
			width: 98%;
			height: 300px;
			background: #f4f4f4;
			margin: 10px auto;
			display: flex;
			justify-content: left;
			overflow-x: auto;
		}
		section::-webkit-scrollbar{
			visibility: hidden;
		}
		div.carousel{
			min-width: 330px;
			height: 200px;
			position: relative;
			left: 0px;
			text-align: center;
			padding-top: 60px;
			font-size: 100px;
			font-weight: bold;
			color: white;
			margin: 10px 20px;
			transition: 0.5s all;
			background: rgb(65, 65, 65);

		} */
      </style>
      </head>

      <?php include_once "navbar.html" ?>

        <div id="mainContainer">
          <div id="streamingContainer" class="container" style="max-width:100%; padding:0;">    
      <div style="padding-left:0; padding-right:0">
          <div style="width:100%;" class="mr-auto ml-auto">
              <div style="background-image:url('/images/form.jpg'); background-repeat:no-repeat; background-position:inherit; background-size:cover; background-color:#1C1C1C; padding:20px;">
                  <div class="cginfo-custom mr-auto ml-auto" style="font-size:30px; margin-bottom:3px; color:white; max-width:770px;">
                      Galeri            
                  </div>
                  <div class="mr-auto ml-auto" style="font-size:14px; margin:auto; color:#a5a5a5; max-width:770px;">
                      Berisi album atau galeri kegiatan gereja.          
                  </div>
              </div>
              <br>
              <br>
              <br>

              <!-- testing -->

              <!-- <main>
                  <h1>Event AOG </h1>
                  <span>&#139;</span>
                  <span>&#155;</span>
                  <section>
                    <div class ="carousel"> 01 </div>
                    <div class ="carousel"> 02 </div>
                    <div class ="carousel"> 03 </div>
                    <div class ="carousel"> 04 </div>
                    <div class ="carousel"> 05 </div>
                    <div class ="carousel"> 06 </div>
                  </section>
                </main> -->

              <!-- batas testing -->

<section class="articles">
<?php
include '../admin/koneksi.php'; // Using database connection file here

$records = mysqli_query($sambung,"select id, galeriKategori.namaKategori, file_name from galeri inner join galeriKategori on galeriKategori.idKategoriGaleri=galeri.kategori order by id desc ");



while($data = mysqli_fetch_array($records))
{
  
?>
    
      <article>
      <h2><?php echo $data["namaKategori"]; ?></h2>
        <div class="article-wrapper">
          <?php echo "<img src='../admin/gambarGaleri/" . $data["file_name"] . "'>"; ?>

</div>
  
</article>

<?php
}
?>
</section>


<?php mysqli_close($sambung); // Close connection ?>
<br>
<br>
<br>




              
    </body>
</html>


<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>




<!-- <script type="text/javascript">
	var span = document.getElementsByTagName('span');
	var div = document.getElementsByClassName('carousel')
	var l = 0;
	span[1].onclick = ()=>{
		l++;
		for(var i of div)
		{
			if (l==0) {i.style.left = "0px";}
			if (l==1) {i.style.left = "-740px";}
			if (l==2) {i.style.left = "-1480px";}
			if (l==3) {i.style.left = "-2220px";}
			if (l==4) {i.style.left = "-2960px";}
			if (l>4) {l=4;}
		}
	}
	span[0].onclick = ()=>{
		l--; 
		for(var i of div)
		{	
			if (l==0) {i.style.left = "0px";}
			if (l==1) {i.style.left = "-740px";}
			if (l==2) {i.style.left = "-1480px";}
			if (l==3) {i.style.left = "-2220px";}
			if (l < 0) {l=0;}
		}
	}
	

</script> -->