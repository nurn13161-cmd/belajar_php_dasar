<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM obat WHERE id = $id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama_obat  = mysqli_real_escape_string($conn, $_POST['nama_obat']);
    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
    $stok       = $_POST['stok'];
    $harga_jual = $_POST['harga_jual'];
    $kadaluarsa = $_POST['kadaluarsa'];

    $query = "UPDATE obat SET nama_obat = '$nama_obat', kategori = '$kategori', stok = '$stok', harga_jual = '$harga_jual', kadaluarsa = '$kadaluarsa' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Gagal mengupdate data obat!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Obat</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" value="<?= $row['nama_obat']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="Tablet" <?= ($row['kategori'] == 'Tablet') ? 'selected' : ''; ?>>Tablet</option>
                    <option value="Sirup" <?= ($row['kategori'] == 'Sirup') ? 'selected' : ''; ?>>Sirup</option>
                    <option value="Salep" <?= ($row['kategori'] == 'Salep') ? 'selected' : ''; ?>>Salep</option>
                    <option value="Injeksi" <?= ($row['kategori'] == 'Injeksi') ? 'selected' : ''; ?>>Injeksi</option>
                    <option value="Kapsul" <?= ($row['kategori'] == 'Kapsul') ? 'selected' : ''; ?>>Kapsul</option>
                </select>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" value="<?= $row['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" value="<?= $row['harga_jual']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kadaluarsa</label>
                <input type="date" name="kadaluarsa" value="<?= $row['kadaluarsa']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn" style="width: 100%;">Update Obat</button>
        </form>
        <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>