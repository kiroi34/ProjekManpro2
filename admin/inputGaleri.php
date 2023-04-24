<?php
  require_once 'koneksi.php';

  session_start();

  if(!isset($_SESSION['username'])){
    header("location: loginAdmin.php");
    exit;
  }

  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Input Galeri</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/inputGaleri.css"> 
     <!-- <link rel="stylesheet" href="css/bootstrap.css">  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <style>
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
              
      
           
     </style>
   </head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-user'></i>
      <span class="logo_name">Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="homeAdmin.php">
            <i class='bx bx-home-alt' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="postingNews.php">
            <i class='bx bx-news' ></i>
            <span class="links_name">Posting News</span>
          </a>
        </li>
        <li>
          <a href="inputGaleri.php" class="active">
            <i class='bx bx-photo-album' ></i>
            <span class="links_name">Input Galeri</span>
          </a>
        </li>
        <li>
          <a href="kelolaKegiatan.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Kelola Kegiatan</span>
          </a>
        </li>
        <li>
          <a href="inputJadwal.php">
            <i class='bx bx-calendar' ></i>
            <span class="links_name">Input Jadwal</span>
          </a>
        </li>
        <li>
          <a href="biodataPendeta.php">
            <i class='bx bx-face' ></i>
            <span class="links_name">Biodata Pendeta</span>
          </a>
        </li>
        <li>
          <a href="penggalanganDana.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Penggalangan Dana</span>
          </a>
        </li>
        <li>
          <a href="inputFAQ.php">
            <i class='bx bx-pencil' ></i>
            <span class="links_name">Input FAQ</span>
          </a>
        </li>
        <br>
        <li class="log_out">
          <a href="logoutAdmin.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Input Galeri</span>
      </div>
      <div class="profile-details">
        <span class="admin_name"><?php echo $_SESSION['username'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
        <div class="isi" >
            <form action="inputGaleriDataBase.php" method="post" onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
                <!-- testing -->
                <br>
                <input type="file" id="inputFoto" name="files[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
                <label for="inputFoto">
                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                </label>
                <p id="jumlahFoto">No Files Chosen</p>
                <div id="gambar"></div>

                <input type="submit" value="Submit" name="submit">
              </form>
        </div>
</div>
<br>
<br>
<br>
<br>
<!-- coba tarik dari database ke admin page -->
<section class="articles">
<?php
include 'koneksi.php'; // Using database connection file here

$records = mysqli_query($sambung,"select * from galeri order by id desc "); // fetch data from database harus pakai join buat jabatan
while($data = mysqli_fetch_array($records))
{
?>
    
      <article>
        <div class="article-wrapper">

          <?php echo "<img src='../admin/gambarGaleri/" . $data["file_name"] . "'>"; ?>

          <div class="btn-group" style="width:50%">
            <form action="deleteGaleri.php" method="post">
              <input type = "hidden" name ="dapetinNama" value="<?php echo $data['file_name']?>">
              <button class="edit" value="delete" name="delete" style="width: 45%; background-color: #FF4136;">Delete</button>
            </form>
          </div>
</div>
  
</article>

<?php
}
?>
</section>


<?php mysqli_close($sambung); // Close connection ?>








  </section>
  


  <script>
     let fileInput = document.getElementById("inputFoto");
        let imageContainer = document.getElementById("gambar");
        let numOfFiles = document.getElementById("jumlahFoto");

        function preview(){
            imageContainer.innerHTML = "";
            numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

            for(i of fileInput.files){
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                figCap.innerText = i.name;
                figure.appendChild(figCap);
                reader.onload=()=>{
                    let img = document.createElement("img");
                    img.setAttribute("src",reader.result);
                    figure.insertBefore(img,figCap);
                }
                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
            }
        }



    
     function validateForm() {
        let a = document.forms["myForm"]["inputFoto"].value;
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }

 </script>
</body>
</html>

