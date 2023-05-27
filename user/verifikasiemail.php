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
  background-color: #07012d;
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

<?php
 require_once "../admin/Other/functions.php";
 require_once "koneksi.php";
 if(isset($_POST['submit'])){
 $email = $_POST['email'];
 $sql = ("select * from akunjemaat where email='".$email."'  limit 1");
 $stmt = $sambung->query($sql);
   foreach ($stmt as $data) {
     $subject = "Reset Password";
     $body= 
     "<html>
     <body>
     
      <p><b> Hello! </b></p>
      <p> Berikut adalah link untuk mereset password anda</p>
      <button class='btn btn-primary'><a href='http://localhost/ProjekManpro2/user/resetPassword.php?secret=".base64_encode($email)."'>Reset Password</a></button></p>
      <br>
      <p> Terimakasih  </p>
     
     </body>
     </html>";
     sendEmail($subject,$body,$email);
 }
}
?>
<body>
<div class="bg-image"> </div>
  <form action="" method = "post" class="container">
    <h1 style = "color : #f4f2ff">Verifikasi</h1>

    <label for="email"><b style = "color : #f4f2ff">Email</b></label>
    <input type="text" placeholder="Email" id="email"  name="email" required>
        <button type="submit" class="btn" name="submit">Send Verification Link</button> 
        
        <p style="Color:White;"><?php if(!empty($msg)){echo $msg;}?></p>
    </div>
  </form>
</body>
</html>
