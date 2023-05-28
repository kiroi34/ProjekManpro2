<?php
    require_once '../koneksi.php';
    session_start();
    $wish = $_POST['wish'];
    $sql = "UPDATE ultahjemaat SET wish = '".$wish."' WHERE idgereja = ".$_SESSION['gereja'];
    $stmt = $sambung->query($sql);
    $sambung->close(); 
?>