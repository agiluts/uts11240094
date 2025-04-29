<?php
//file login.php
//konfigurasi
include"koneksi_db.php";

echo"<form method='POST' action=''>";
echo"<table border='1' width='300' align='center'>";
echo"<tr><th colspan='2'>FORM LOGIN</th></tr>";
echo"<tr><td>Username</td><td><input type='text' name='user' size='10' maxlength='10' required></td></tr>";
echo"<tr><td>Password</td><td><input type='password' name='pass' size='10' maxlength='10' required></td></tr>";

echo"<tr><th colspan='2'><input type='submit' value='OK' name='kirim'></th></tr>";
echo"</table>";
echo"</form>";
if (isset($_POST['kirim'])){
    echo "Tombol sudah ditekan, tunggu 2 detik...";
    echo "<meta http-equiv='refresh' content='2; url=login.php'>";
}
 //Tutup koneksi database jika sudah tersambung
 if (isset($conn)) {
    mysqli_close($conn);
    }
?>