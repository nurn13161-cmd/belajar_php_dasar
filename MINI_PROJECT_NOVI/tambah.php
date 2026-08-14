<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_obat  = mysqli_real_escape_string($conn, $_POST['nama_obat']);
    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
    $stok       = $_POST['stok'];
    $harga_jual = $_POST['harga_jual'];
    $kadaluarsa = $_POST['kadaluarsa'];

    $query = "INSERT INTO obat (nama_obat, kategori, stok, harga_jual, kadaluarsa) VALUES ('$nama_obat', '$kategori', '$stok', '$harga_jual', '$kadaluarsa')";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Gagal menambah data obat!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Obat</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Sirup">Sirup</option>
                    <option value="Salep">Salep</option>
                    <option value="Injeksi">Injeksi</option>
                    <option value="Kapsul">Kapsul</option>
                </select>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" required>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kadaluarsa</label>
                <input type="date" name="kadaluarsa" required>
            </div>
            <button type="submit" name="submit" class="btn" style="width: 100%;">Simpan Obat</button>
        </form>
        <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>