<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id_area   = $_POST['id_area'];
    $nama_area = $_POST['nama_area'];
    $ongkir    = $_POST['ongkir'];

    mysqli_query($conn, "
        INSERT INTO area_pengiriman (id_area, nama_area, ongkir)
        VALUES ('$id_area', '$nama_area', '$ongkir')
    ");

    header("Location: area_pengiriman.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "
        DELETE FROM area_pengiriman
        WHERE id_area='$id'
    ");

    header("Location: area_pengiriman.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $edit = true;
    $id = $_GET['edit'];

    $q = mysqli_query($conn, "
        SELECT * FROM area_pengiriman
        WHERE id_area='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id_area   = $_POST['id_area'];
    $nama_area = $_POST['nama_area'];
    $ongkir    = $_POST['ongkir'];

    mysqli_query($conn, "
        UPDATE area_pengiriman SET
            nama_area='$nama_area',
            ongkir='$ongkir'
        WHERE id_area='$id_area'
    ");

    header("Location: area_pengiriman.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Area Pengiriman</title>
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

<div class="header-card">
    <h1>📍 Data Area Pengiriman</h1>
</div>

<!-- ================= FORM ================= -->
<div class="content-card">
<form method="post" class="form-grid">

    <div class="form-group">
        <label>ID</label>
        <input type="text" name="id_area" required
               value="<?= $edit ? $dataEdit['id_area'] : '' ?>"
               <?= $edit ? 'readonly' : '' ?>>
    </div>

    <div class="form-group">
        <label>Nama Area</label>
        <input type="text" name="nama_area" required
               value="<?= $edit ? $dataEdit['nama_area'] : '' ?>">
    </div>

    <div class="form-group">
        <label>Ongkir</label>
        <input type="number" name="ongkir" required
               value="<?= $edit ? $dataEdit['ongkir'] : '' ?>">
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="area_pengiriman.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>

</form>
</div>

<!-- ================= TABEL ================= -->
<div class="content-card">
<h3>Daftar Area Pengiriman</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>Nama Area</th>
    <th style="text-align:right;">Ongkir</th>
    <th style="text-align:center;">Aksi</th>
</tr>
</thead>
<tbody>

<?php
$data = mysqli_query($conn, "
    SELECT * FROM area_pengiriman
    ORDER BY id_area ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_area'] ?></td>
    <td><?= $d['nama_area'] ?></td>
    <td style="text-align:right;">
        Rp <?= number_format($d['ongkir'],0,',','.') ?>
    </td>
    <td style="text-align:center;">
        <a class="btn-edit" href="?edit=<?= $d['id_area'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_area'] ?>"
           onclick="return confirm('Hapus area ini?')">
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
