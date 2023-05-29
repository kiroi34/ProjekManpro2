<?php
  require_once "koneksi.php";
  session_start();
  if (isset($_GET['gereja'])) {
    $sql = "SELECT * FROM gereja WHERE link = '".$_GET['gereja']."'";
    $records = mysqli_query($sambung,$sql);
    while($data = mysqli_fetch_array($records)){
    $_SESSION['gereja'] = $data['idgereja'];
    $_SESSION['namagereja'] = $_GET['gereja'];
    }
} else {
    header("Location: registgereja.php");
}
?>
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
              /* article:has(:hover, :focus) {
                --img-scale: 1.1;
                --title-color: #28666e;
                --link-icon-translate: 0;
                --link-icon-opacity: 1;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
              } */
              
              *,
              *::before,
              *::after {
                box-sizing: border-box;
              }
              
              .articles {
                display:  grid;
                max-width: 500px;
                margin-inline:  180px;
                padding-inline: 24px;
                grid-template-columns: auto;
                gap: 24px;
              }
      </style>
      </head>

      <?php include_once "navbar.php" ?>

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

<section class="articles">

<?php
include '../admin/koneksi.php'; // Using database connection file here
$records = mysqli_query($sambung,"SELECT * FROM galerikategori WHERE idgereja=".$_SESSION['gereja']);
while($data = mysqli_fetch_array($records)){
$id = $data['idKategoriGaleri'];
$coba = mysqli_query($sambung,"SELECT COUNT(*) jumlah from galeri join galerikategori on kategori=idKategoriGaleri 
where idKategoriGaleri=$id");
$row = $coba->fetch_assoc();

if($row['jumlah'] > 0){
  echo"<h2> ".$data["namaKategori"]." </h2>";
}
 
  $records2= mysqli_query($sambung,"select id, galeriKategori.namaKategori, file_name from 
  galeri inner join galeriKategori on galeriKategori.idKategoriGaleri=galeri.kategori where galeri.kategori = $id
   order by id desc  ");

   while($data2= mysqli_fetch_array($records2)){
    ?>
    <article>
      <div class="">
        <?php echo "<br> <img src='../admin/gambarGaleri/" . $data2["file_name"] . "'>"; ?>

</div>

</article>

<?php
   }

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

