<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id_pesanan   = $_POST['id_pesanan'];
    $id_metode    = $_POST['id_metode'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $tanggal      = $_POST['tanggal_bayar'];

    mysqli_query($conn, "
        INSERT INTO pembayaran (id_pesanan, id_metode, jumlah_bayar, tanggal_bayar)
        VALUES ('$id_pesanan','$id_metode','$jumlah_bayar','$tanggal')
    ");

    header("Location: pembayaran.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "
        DELETE FROM pembayaran 
        WHERE id_pembayaran='$id'
    ");

    header("Location: pembayaran.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "
        SELECT * FROM pembayaran 
        WHERE id_pembayaran='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id            = $_POST['id_pembayaran'];
    $id_pesanan    = $_POST['id_pesanan'];
    $id_metode     = $_POST['id_metode'];
    $jumlah_bayar  = $_POST['jumlah_bayar'];
    $tanggal       = $_POST['tanggal_bayar'];

    mysqli_query($conn, "
        UPDATE pembayaran SET
            id_pesanan='$id_pesanan',
            id_metode='$id_metode',
            jumlah_bayar='$jumlah_bayar',
            tanggal_bayar='$tanggal'
        WHERE id_pembayaran='$id'
    ");

    header("Location: pembayaran.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran</title>
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
    <h1>💰 Data Pembayaran</h1>
</div>

<!-- FORM -->
<div class="content-card">
<h3><?= $edit ? "Edit Pembayaran" : "Tambah Pembayaran"; ?></h3>

<form method="post" class="form-grid">
    <input type="hidden" name="id_pembayaran"
        value="<?= $edit ? $dataEdit['id_pembayaran'] : '' ?>">

    <div class="form-group">
        <label>ID Pesanan</label>
        <input type="number" name="id_pesanan"
            value="<?= $edit ? $dataEdit['id_pesanan'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>ID Metode</label>
        <input type="number" name="id_metode"
            value="<?= $edit ? $dataEdit['id_metode'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar"
            value="<?= $edit ? $dataEdit['jumlah_bayar'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal Bayar</label>
        <input type="datetime-local" name="tanggal_bayar"
            value="<?= $edit ? date('Y-m-d\TH:i', strtotime($dataEdit['tanggal_bayar'])) : '' ?>" required>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="pembayaran.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>

<!-- TABEL -->
<div class="content-card">
<h3>Daftar Pembayaran</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>ID Pesanan</th>
    <th>ID Metode</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$data = mysqli_query($conn, "
    SELECT * FROM pembayaran 
    ORDER BY id_pembayaran ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_pembayaran'] ?></td>
    <td><?= $d['id_pesanan'] ?></td>
    <td><?= $d['id_metode'] ?></td>
    <td>Rp <?= number_format($d['jumlah_bayar'],0,',','.') ?></td>
    <td><?= $d['tanggal_bayar'] ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_pembayaran'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_pembayaran'] ?>"
           onclick="return confirm('Hapus pembayaran ini?')">
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
