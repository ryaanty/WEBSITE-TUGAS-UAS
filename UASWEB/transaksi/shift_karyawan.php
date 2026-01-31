<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal     = $_POST['tanggal'];
    $shift       = $_POST['shift'];

    mysqli_query($conn, "
        INSERT INTO shift_karyawan (id_karyawan, tanggal, shift)
        VALUES ('$id_karyawan','$tanggal','$shift')
    ");

    header("Location: shift_karyawan.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "
        DELETE FROM shift_karyawan 
        WHERE id_shift='$id'
    ");

    header("Location: shift_karyawan.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "
        SELECT * FROM shift_karyawan 
        WHERE id_shift='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id          = $_POST['id_shift'];
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal     = $_POST['tanggal'];
    $shift       = $_POST['shift'];

    mysqli_query($conn, "
        UPDATE shift_karyawan SET
            id_karyawan='$id_karyawan',
            tanggal='$tanggal',
            shift='$shift'
        WHERE id_shift='$id'
    ");

    header("Location: shift_karyawan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Shift Karyawan</title>
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
    <h1>⏰ Data Shift Karyawan</h1>
</div>

<!-- FORM -->
<div class="content-card">
<h3><?= $edit ? "Edit Shift" : "Tambah Shift"; ?></h3>

<form method="post" class="form-grid">
    <input type="hidden" name="id_shift"
        value="<?= $edit ? $dataEdit['id_shift'] : '' ?>">

    <div class="form-group">
        <label>ID Karyawan</label>
        <input type="number" name="id_karyawan"
            value="<?= $edit ? $dataEdit['id_karyawan'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal"
            value="<?= $edit ? $dataEdit['tanggal'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Shift</label>
        <select name="shift" required>
            <option value="">-- Pilih Shift --</option>
            <option value="Pagi" <?= $edit && $dataEdit['shift']=='Pagi'?'selected':'' ?>>Pagi</option>
            <option value="Siang" <?= $edit && $dataEdit['shift']=='Siang'?'selected':'' ?>>Siang</option>
            <option value="Malam" <?= $edit && $dataEdit['shift']=='Malam'?'selected':'' ?>>Malam</option>
        </select>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="shift_karyawan.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>

<!-- TABEL -->
<div class="content-card">
<h3>Daftar Shift Karyawan</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>ID Karyawan</th>
    <th>Tanggal</th>
    <th>Shift</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$data = mysqli_query($conn, "
    SELECT * FROM shift_karyawan 
    ORDER BY id_shift ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_shift'] ?></td>
    <td><?= $d['id_karyawan'] ?></td>
    <td><?= $d['tanggal'] ?></td>
    <td><?= $d['shift'] ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_shift'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_shift'] ?>"
           onclick="return confirm('Hapus data shift ini?')">
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
