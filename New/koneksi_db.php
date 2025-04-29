<?php
//konfigurasi
$server = "192.168.0.100";
$db = "php_lanjut";
$user = "php";
$pass = "@PhpLanjut123";
//membuat koneksi
$conn = mysqli_connect($server, $user, $pass, $db);
//Check koneksi
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);
?>