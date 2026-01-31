<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_area      = $_POST['id_area'];
    $tanggal      = $_POST['tanggal'];
    $total        = $_POST['total'];
    $status       = $_POST['status'];

    mysqli_query($conn, "
        INSERT INTO pesanan (id_pelanggan, id_area, tanggal, total, status)
        VALUES ('$id_pelanggan','$id_area','$tanggal','$total','$status')
    ");

    header("Location: pesanan.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "
        DELETE FROM pesanan 
        WHERE id_pesanan='$id'
    ");

    header("Location: pesanan.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "
        SELECT * FROM pesanan 
        WHERE id_pesanan='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id           = $_POST['id_pesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_area      = $_POST['id_area'];
    $tanggal      = $_POST['tanggal'];
    $total        = $_POST['total'];
    $status       = $_POST['status'];

    mysqli_query($conn, "
        UPDATE pesanan SET
            id_pelanggan='$id_pelanggan',
            id_area='$id_area',
            tanggal='$tanggal',
            total='$total',
            status='$status'
        WHERE id_pesanan='$id'
    ");

    header("Location: pesanan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pesanan</title>
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
    <h1>📝 Data Pesanan</h1>
</div>

<!-- FORM -->
<div class="content-card">
<h3><?= $edit ? "Edit Pesanan" : "Tambah Pesanan"; ?></h3>

<form method="post" class="form-grid">
    <input type="hidden" name="id_pesanan"
        value="<?= $edit ? $dataEdit['id_pesanan'] : '' ?>">

    <div class="form-group">
        <label>ID Pelanggan</label>
        <input type="number" name="id_pelanggan"
            value="<?= $edit ? $dataEdit['id_pelanggan'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>ID Area</label>
        <input type="number" name="id_area"
            value="<?= $edit ? $dataEdit['id_area'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="datetime-local" name="tanggal"
            value="<?= $edit ? date('Y-m-d\TH:i', strtotime($dataEdit['tanggal'])) : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="number" name="total"
            value="<?= $edit ? $dataEdit['total'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" required>
            <option value="">-- Pilih Status --</option>
            <option value="Diproses" <?= $edit && $dataEdit['status']=='Diproses'?'selected':'' ?>>Diproses</option>
            <option value="Selesai" <?= $edit && $dataEdit['status']=='Selesai'?'selected':'' ?>>Selesai</option>
        </select>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="pesanan.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>

<!-- TABEL -->
<div class="content-card">
<h3>Daftar Pesanan</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>ID Pelanggan</th>
    <th>ID Area</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$data = mysqli_query($conn, "
    SELECT * FROM pesanan 
    ORDER BY id_pesanan ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_pesanan'] ?></td>
    <td><?= $d['id_pelanggan'] ?></td>
    <td><?= $d['id_area'] ?></td>
    <td><?= $d['tanggal'] ?></td>
    <td>Rp <?= number_format($d['total'],0,',','.') ?></td>
    <td><?= $d['status'] ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_pesanan'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_pesanan'] ?>"
           onclick="return confirm('Hapus pesanan ini?')">
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
