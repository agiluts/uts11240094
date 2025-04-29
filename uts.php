<html>
<head>
    <title>Perbaikan Uts - DATA PRODUK</title>
    <script>
        function submitForm() {
            document.getElementById("searchForm").submit();
        }
    </script>
</head>
<body>

<?php
include "koneksi_db.php"; // Pastikan koneksi ke database benar

$searchBy = isset($_POST['searchBy']) ? $_POST['searchBy'] : '';
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';

$query = "SELECT Products.productID, Products.product_name, Suppliers.supplier_name, Categories.category_name, Products.unit, Products.price 
          FROM Products 
          JOIN Suppliers ON Products.supplierID = Suppliers.supplierID 
          JOIN Categories ON Products.categoryID = Categories.categoryID";

if (!empty($searchBy) && !empty($searchQuery)) {
    $query .= " WHERE $searchBy LIKE '%$searchQuery%'";
}

$result = mysqli_query($conn, $query);
?>

<h2 align="center">DATA PRODUK</h2>

<form method="post" id="searchForm">
    Cari Berdasarkan :
    <select name="searchBy" onchange="submitForm()">
        <option value="">-- Pilih --</option>
        <option value="Products.productID" <?= $searchBy == 'Products.productID' ? 'selected' : '' ?>>ID Produk</option>
        <option value="Products.product_name" <?= $searchBy == 'Products.product_name' ? 'selected' : '' ?>>Nama Produk</option>
        <option value="Suppliers.supplier_name" <?= $searchBy == 'Suppliers.supplier_name' ? 'selected' : '' ?>>Nama Supplier</option>
        <option value="Categories.category_name" <?= $searchBy == 'Categories.category_name' ? 'selected' : '' ?>>Kategori</option>
        <option value="Products.price" <?= $searchBy == 'Products.price' ? 'selected' : '' ?>>Harga</option>
    </select>
    <input type="text" name="searchQuery" value="<?= htmlspecialchars($searchQuery) ?>" placeholder="Masukkan kata kunci">
    <input type="submit" value="OK">
</form>

<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr bgcolor="gray" align="center">
        <th>No</th>
        <th>Product ID</th>
        <th>Nama Produk</th>
        <th>Nama Supplier</th>
        <th>Kategori</th>
        <th>Unit</th>
        <th>Harga</th>
    </tr>

    <?php
    $no = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $no++;
        echo "<tr>
                <td align='center'>$no</td>
                <td align='center'>{$row['productID']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['supplier_name']}</td>
                <td>{$row['category_name']}</td>
                <td>{$row['unit']}</td>
                <td>\${$row['price']}</td>
              </tr>";
    }
    ?>
</table>

</body>
</html>