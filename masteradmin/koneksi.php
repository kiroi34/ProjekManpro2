<?php

$sambung = mysqli_connect("localhost", "root", "", "dbgereja");

if (!$sambung) { // jika tidak terkoneksi maka menampilkan pesan error
    die("Gagal terhubung ke database : " . mysqli_connect_errno());
}