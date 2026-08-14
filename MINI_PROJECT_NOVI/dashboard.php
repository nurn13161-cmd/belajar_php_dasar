<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';

$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
    $query = "SELECT * FROM obat WHERE nama_obat LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM obat";
}
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Stok Obat Apotek</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Data Stok Obat Apotek</h2>
        <p style="text-align: left; margin-bottom: 20px;">Halo, <b><?= $_SESSION['username']; ?></b> | <a href="logout.php" style="color: #e53935;">Logout</a></p>

        <div class="top-bar">
            <a href="tambah.php" class="btn">+ Tambah Obat</a>
            <form action="" method="GET" class="search-box">
                <input type="text" name="keyword" placeholder="Cari nama obat / kategori..." value="<?= $keyword; ?>">
                <button type="submit" name="cari" class="btn">Cari</button>
            </form>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga Jual (Rp)</th>
                        <th>Kadaluarsa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_obat']); ?></td>
                            <td><?= htmlspecialchars($row['kategori']); ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                            <td><?= $row['kadaluarsa']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data obat ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" style="text-align: center;">Tidak ada data obat ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>