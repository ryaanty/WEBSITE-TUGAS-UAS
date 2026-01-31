<?php
include "../databes/koneksi.php";

/* ================= QUERY STATISTIK ================= */
function getTotal($conn, $table) {
    $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM $table");
    $r = mysqli_fetch_assoc($q);
    return $r['total'] ?? 0;
}

$menu              = getTotal($conn, 'menu');
$kategori_menu     = getTotal($conn, 'kategori_menu');
$pelanggan         = getTotal($conn, 'pelanggan');
$karyawan          = getTotal($conn, 'karyawan');
$supplier          = getTotal($conn, 'supplier');
$bahan_baku        = getTotal($conn, 'bahan_baku');
$area_pengiriman   = getTotal($conn, 'area_pengiriman');
$metode_pembayaran = getTotal($conn, 'metode_pembayaran');

$pesanan           = getTotal($conn, 'pesanan');
$detail_pesanan    = getTotal($conn, 'detail_pesanan');
$pembayaran        = getTotal($conn, 'pembayaran');
$stok_menu         = getTotal($conn, 'stok_menu');
$shift_karyawan    = getTotal($conn, 'shift_karyawan');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Banua Kitchen</title>
    <link rel="stylesheet" href="../css/utama.css">
</head>
<body>

<div class="layout">

<!-- SIDEBAR -->
<aside class="sidebar">
    <h2 class="logo">🍽️ Banua Kitchen</h2>

    <ul class="menu">
        <!-- Dashboard -->
        <li>
            <a href="../dashboard.php">📊 Dashboard</a>
        </li>

        <!-- Master Data -->
        <p class="menu-title">Master Data</p>
        <li><a href="../master/menu.php">🍱 Menu</a></li>
        <li><a href="../master/kategori_menu.php">📁 Kategori Menu</a></li>
        <li><a href="../master/pelanggan.php">👥 Pelanggan</a></li>
        <li><a href="../master/karyawan.php">👨‍🍳 Karyawan</a></li>
        <li><a href="../master/supplier.php">🚚 Supplier</a></li>
        <li><a href="../master/bahan_baku.php">🥘 Bahan Baku</a></li>
        <li><a href="../master/area_pengiriman.php">📍 Area Pengiriman</a></li>
        <li><a href="../master/metode_pembayaran.php">💳 Metode Pembayaran</a></li>

        <!-- Transaksi -->
        <p class="menu-title">Transaksi</p>
        <li><a href="../transaksi/pesanan.php">📝 Pesanan</a></li>
        <li><a href="../transaksi/pembayaran.php">💰 Pembayaran</a></li>
        <li><a href="../transaksi/stok_menu.php">📦 Stok Menu</a></li>
        <li><a href="../transaksi/shift_karyawan.php">🕐 Shift Karyawan</a></li>

        <!-- Laporan -->
        <p class="menu-title">Laporan</p>
        <li>
            <a href="../laporan/laporan_pesanan.php">
                📑 Laporan Pesanan
            </a>
        </li>
        <li>
            <a href="../laporan/laporan_detail_pesanan.php">
                📄 Laporan Detail Pesanan
            </a>
        </li>
    </ul>
</aside>

<!-- MAIN -->
<main class="main">

<div class="header-card">
    <h1>📊 Dashboard Banua Kitchen</h1>
    <p>Ringkasan Sistem Cloud Kitchen</p>
</div>

<!-- MASTER DATA -->
<div class="content-card">
<h3>📁 Master Data</h3>
<div class="stats-grid">
    <div class="stat-card"><h2><?= $menu ?></h2><p>Menu</p></div>
    <div class="stat-card"><h2><?= $kategori_menu ?></h2><p>Kategori</p></div>
    <div class="stat-card"><h2><?= $pelanggan ?></h2><p>Pelanggan</p></div>
    <div class="stat-card"><h2><?= $karyawan ?></h2><p>Karyawan</p></div>
    <div class="stat-card"><h2><?= $supplier ?></h2><p>Supplier</p></div>
    <div class="stat-card"><h2><?= $bahan_baku ?></h2><p>Bahan Baku</p></div>
</div>
</div>

<!-- TRANSAKSI -->
<div class="content-card">
<h3>💳 Transaksi</h3>
<div class="stats-grid">
    <div class="stat-card highlight"><h2><?= $pesanan ?></h2><p>Pesanan</p></div>
    <div class="stat-card highlight"><h2><?= $pembayaran ?></h2><p>Pembayaran</p></div>
    <div class="stat-card highlight"><h2><?= $stok_menu ?></h2><p>Stok Menu</p></div>
    <div class="stat-card highlight"><h2><?= $shift_karyawan ?></h2><p>Shift</p></div>
</div>
</div>
</table>
</div>

</main>
</div>

</body>
</html>
