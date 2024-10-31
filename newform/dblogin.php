<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$dbname = "user_db";  // Ganti dengan nama database yang benar

$conn = mysqli_connect($host, $user, $password, $user);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
