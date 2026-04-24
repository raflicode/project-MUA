<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "project_mua"; // ganti sesuai nama database lo

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>