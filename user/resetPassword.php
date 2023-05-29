<?php
require_once 'koneksi.php';
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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: 'Poppins';font-size: 18px;
}

* {
  box-sizing: border-box;
}


/* Add styles to the form container */
.container {
  Top : 10%;
  Left : 38%;
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color:  #07012d;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #c1c1c1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #f59d06;
  color: white;
  padding: 16px 20px;
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
  background-image: url("assets/homegereja.jpg");
  
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
</style>
</head>
<body>
<div class="bg-image"> </div>
  <form action="validasiResetPassword.php" method = "post" class="container">
  
    <h1 style = "color : #f4f2ff; font-size:30px;">Reset Password </h1>
    <input type="hidden" value="<?php echo base64_decode($_GET['secret']); ?>" name="email"> 

    <label for="password"><b style = "color : #f4f2ff">Password Baru</b></label>
    <input type="password" placeholder="Password" name="password" required>
    <label for="newpassword"><b style = "color : #f4f2ff">Konfirmasi Password</b></label>
    <input type="password" placeholder="Konfirmasi Password" name="cpassword" required>
    <div style="size: 20px;">
    
        <button type="submit" class="btn" name="submit">Oke</button> 
    </div>
  </form>
</body>
</html>