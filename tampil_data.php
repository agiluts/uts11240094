<html>
<head>
    <title>Tampil Data</title>
    <script>
        function submitForm() {
            document.getElementById("searchForm").submit();
        }
    </script>
</head>
<body>

<?php
include "koneksi_db.php";

// Ambil nilai pencarian jika ada
$searchBy = isset($_POST['searchBy']) ? $_POST['searchBy'] : '';
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

// Query dasar
$query = "SELECT * FROM Customers";

// Tambahkan filter jika ada pencarian
if (!empty($searchBy) && !empty($searchQuery)) {
    $query .= " WHERE $searchBy LIKE '%$searchQuery%'";
}

$result = mysqli_query($conn, $query);
?>

<form method="post" id="searchForm">
    Cari Berdasarkan:
    <select name="searchBy" onchange="submitForm()">
        <option value="">-- Pilih --</option>
        <option value="customerID" <?= $searchBy == 'customerID' ? 'selected' : '' ?>>ID Konsumen</option>
        <option value="customer_name" <?= $searchBy == 'customer_name' ? 'selected' : '' ?>>Nama Konsumen</option>
        <option value="contact_name" <?= $searchBy == 'contact_name' ? 'selected' : '' ?>>Nama Kontak</option>
        <option value="address" <?= $searchBy == 'address' ? 'selected' : '' ?>>Alamat</option>
        <option value="city" <?= $searchBy == 'city' ? 'selected' : '' ?>>Kota</option>
        <option value="postal_code" <?= $searchBy == 'postal_code' ? 'selected' : '' ?>>Kode POS</option>
        <option value="country" <?= $searchBy == 'country' ? 'selected' : '' ?>>Negara</option>
    </select>
    <input type="text" name="searchQuery" value="<?= htmlspecialchars($searchQuery) ?>" placeholder="Masukkan kata kunci">
    <input type="submit" value="OK">
</form>

<table width="100%" border="1">
    <tr bgcolor="grey">
        <th>NO</th>
        <th>ID</th>
        <th>Nama Konsumen</th>
        <th>Nama Kontak</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Kode Pos</th>
        <th>Negara</th>
    </tr>

    <?php
    $no = 0;
    while ($a = mysqli_fetch_array($result)) {
        $no++;
        echo "<tr>
                <td align='center'>$no</td>
                <td align='center'>{$a['customerID']}</td>
                <td>{$a['customer_name']}</td>
                <td>{$a['contact_name']}</td>
                <td>{$a['address']}</td>
                <td>{$a['city']}</td>
                <td>{$a['postal_code']}</td>
                <td>{$a['country']}</td>
              </tr>";
    }
    ?>
</table>

</body>
</html>