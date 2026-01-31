<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $metode = $_POST['metode'];

    mysqli_query($conn, "
        INSERT INTO metode_pembayaran (metode)
        VALUES ('$metode')
    ");

    header("Location: metode_pembayaran.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "
        DELETE FROM metode_pembayaran
        WHERE id_metode='$id'
    ");

    header("Location: metode_pembayaran.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "
        SELECT * FROM metode_pembayaran
        WHERE id_metode='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id_metode = $_POST['id_metode'];
    $metode    = $_POST['metode'];

    mysqli_query($conn, "
        UPDATE metode_pembayaran SET
            metode='$metode'
        WHERE id_metode='$id_metode'
    ");

    header("Location: metode_pembayaran.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Metode Pembayaran</title>
    <link rel="stylesheet" href="../css/utama.css">
</head>
<body>

<div class="layout">

<!-- ================= SIDEBAR ================= -->
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

<!-- ================= MAIN ================= -->
<main class="main">

<!-- HEADER -->
<div class="header-card">
    <h1>💳 Metode Pembayaran</h1>
</div>

<!-- ================= FORM ================= -->
<div class="content-card">
<h3><?= $edit ? "Edit Metode Pembayaran" : "Tambah Metode Pembayaran"; ?></h3>

<form method="post" class="form-grid">

<?php if ($edit) { ?>
    <input type="hidden" name="id_metode"
           value="<?= $dataEdit['id_metode']; ?>">
<?php } ?>

<div class="form-group">
    <label>Nama Metode</label>
    <input type="text" name="metode"
           value="<?= $edit ? $dataEdit['metode'] : ''; ?>"
           required>
</div>

<div class="form-group form-action">
    <?php if ($edit) { ?>
        <button type="submit" name="update" class="btn-primary">Update</button>
        <a href="metode_pembayaran.php" class="btn-secondary">Batal</a>
    <?php } else { ?>
        <button type="submit" name="tambah" class="btn-primary">Tambah</button>
    <?php } ?>
</div>

</form>
</div>

<!-- ================= TABEL ================= -->
<div class="content-card">
<h3>Daftar Metode Pembayaran</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>Metode Pembayaran</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$data = mysqli_query($conn, "
    SELECT * FROM metode_pembayaran
    ORDER BY id_metode ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_metode']; ?></td>
    <td><?= htmlspecialchars($d['metode']); ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_metode']; ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_metode']; ?>"
           onclick="return confirm('Hapus metode pembayaran ini?')">
           Hapus
        </a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</main>
</div>

</body>
</html>
