<?php
include "../databes/koneksi.php";

/* ================= TAMBAH ================= */
if (isset($_POST['tambah'])) {
    mysqli_query($conn, "
        INSERT INTO bahan_baku (nama_bahan, stok, satuan, id_supplier)
        VALUES (
            '{$_POST['nama_bahan']}',
            '{$_POST['stok']}',
            '{$_POST['satuan']}',
            '{$_POST['id_supplier']}'
        )
    ");
    header("Location: bahan_baku.php");
    exit;
}

/* ================= HAPUS ================= */
if (isset($_GET['hapus'])) {
    mysqli_query($conn, "
        DELETE FROM bahan_baku
        WHERE id_bahan='{$_GET['hapus']}'
    ");
    header("Location: bahan_baku.php");
    exit;
}

/* ================= EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $edit = true;
    $q = mysqli_query($conn, "
        SELECT * FROM bahan_baku
        WHERE id_bahan='{$_GET['edit']}'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE ================= */
if (isset($_POST['update'])) {
    mysqli_query($conn, "
        UPDATE bahan_baku SET
            nama_bahan='{$_POST['nama_bahan']}',
            stok='{$_POST['stok']}',
            satuan='{$_POST['satuan']}',
            id_supplier='{$_POST['id_supplier']}'
        WHERE id_bahan='{$_POST['id_bahan']}'
    ");
    header("Location: bahan_baku.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Bahan Baku</title>
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
    <h1>🥬 Data Bahan Baku</h1>
</div>

<!-- FORM -->
<div class="content-card">
<form method="post" class="form-grid">

    <?php if ($edit) { ?>
        <input type="hidden" name="id_bahan" value="<?= $dataEdit['id_bahan'] ?>">
    <?php } ?>

    <div class="form-group">
        <label>Nama Bahan</label>
        <input type="text" name="nama_bahan" required
               value="<?= $edit ? $dataEdit['nama_bahan'] : '' ?>">
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" required
               value="<?= $edit ? $dataEdit['stok'] : '' ?>">
    </div>

    <div class="form-group">
        <label>Satuan</label>
        <input type="text" name="satuan" required
               value="<?= $edit ? $dataEdit['satuan'] : '' ?>">
    </div>

    <div class="form-group">
        <label>ID Supplier</label>
        <input type="number" name="id_supplier" required
               value="<?= $edit ? $dataEdit['id_supplier'] : '' ?>">
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="bahan_baku.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>

</form>
</div>

<!-- TABEL -->
<div class="content-card">
<h3>Daftar Bahan Baku</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>Nama Bahan</th>
    <th>Stok</th>
    <th>Satuan</th>
    <th>ID Supplier</th>
    <th style="text-align:center;">Aksi</th>
</tr>
</thead>
<tbody>

<?php
$data = mysqli_query($conn, "SELECT * FROM bahan_baku ORDER BY id_bahan ASC");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_bahan'] ?></td>
    <td><?= $d['nama_bahan'] ?></td>
    <td><?= $d['stok'] ?></td>
    <td><?= $d['satuan'] ?></td>
    <td><?= $d['id_supplier'] ?></td>
    <td style="text-align:center;">
        <a class="btn-edit" href="?edit=<?= $d['id_bahan'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_bahan'] ?>"
           onclick="return confirm('Hapus data ini?')">
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
