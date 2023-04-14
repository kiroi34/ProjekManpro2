<?php
    $serverName = "localhost";
    $username = "admin";
    $password = "admin";
    $dbName = "dbgereja";

    // create connection
    $conn = new mysqli($serverName, $username, $password, $dbName);

    // check connection
    if($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }
?>
