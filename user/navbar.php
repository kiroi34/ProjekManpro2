


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container" style="position:relative;">
            <a class="navbar-brand" href="/">        
                <img src="assets/logogereja.png" class="logo_main" alt="Gereja" height="40">
            </a>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style="padding-top:40px ;">
                    <li class="nav-item">
                        <a class="nav-link" href="Homeuser.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="News.php">Berita</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Pendeta.php">Pendeta</a>
                  </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Form.php">Formulir</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="FAQ.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftarPenggalanganDana.php">Penggalangan dana</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="ContactUs.php">Hubungi Kami</a>
                  </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kalender.php">Kalender</a> 
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Galeri.php">Galeri</a> 
                  </li>
                    <li class="nav-item">
                      <a class="nav-link" href="keluar.php">
                        <?php

                      if(isset($_SESSION['user'])){
                        echo 'Keluar';
                        } else {
                        echo 'Masuk';
                        }
                      
                                            
                      ?>
                      </a>
                  </li>
                </ul>
            </div>
          </div>
      </nav>
</body>
</html>