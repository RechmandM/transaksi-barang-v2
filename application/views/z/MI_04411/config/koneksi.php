<?php
$servername = "localhost";
$database = "db_madurajaya";
$username = "root";
$password = "";
$port = "3307";


$conn = mysqli_connect($servername, $username, $password, $database, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
//echo "Koneksi berhasil";
//mysqli_close($conn);
