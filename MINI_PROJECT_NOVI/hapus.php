<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM obat WHERE id = $id");
header("Location: dashboard.php");
exit;
?>