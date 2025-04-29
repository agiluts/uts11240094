<?php
//konfigurasi
$server = "36.88.175.58";
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