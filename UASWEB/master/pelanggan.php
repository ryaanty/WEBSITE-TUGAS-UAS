<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id   = $_POST['id'];
    $nama   = $_POST['nama'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kota   = $_POST['kota'];

    mysqli_query($conn, "
        INSERT INTO pelanggan (id_pelanggan, nama, no_hp, alamat, kota)
        VALUES ('$id_pelanggan','$nama','$no_hp','$alamat','$kota')
    ");

    header("Location: pelanggan.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "
        DELETE FROM pelanggan 
        WHERE id_pelanggan='$id'
    ");

    header("Location: pelanggan.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "
        SELECT * FROM pelanggan 
        WHERE id_pelanggan='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id     = $_POST['id_pelanggan'];
    $nama   = $_POST['nama'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kota   = $_POST['kota'];

    mysqli_query($conn, "
        UPDATE pelanggan SET
            nama='$nama',
            no_hp='$no_hp',
            alamat='$alamat',
            kota='$kota'
        WHERE id_pelanggan='$id'
    ");

    header("Location: pelanggan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
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
    <h1>👥 Data Pelanggan</h1>
</div>

<!-- ================= FORM ================= -->
<div class="content-card">
<h3><?= $edit ? "Edit Pelanggan" : "Tambah Pelanggan"; ?></h3>

<form method="post" class="form-grid">
    <input type="hidden" name="id_pelanggan"
           value="<?= $edit ? $dataEdit['id_pelanggan'] : '' ?>">
    
<div class="form-group">
        <label>ID</label>
        <input type="text" name="id_pelanggan"
               value="<?= $edit ? $dataEdit['id_pelanggan'] : '' ?>" required>
    </div>
           
    <div class="form-group">
        <label>Nama pelanggan</label>
        <input type="text" name="nama"
               value="<?= $edit ? $dataEdit['nama'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp"
               value="<?= $edit ? $dataEdit['no_hp'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat"
               value="<?= $edit ? $dataEdit['alamat'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Kota</label>
        <input type="text" name="kota"
               value="<?= $edit ? $dataEdit['kota'] : '' ?>" required>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="pelanggan.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>

<!-- ================= TABEL ================= -->
<div class="content-card">
<h3>Daftar Pelanggan</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$data = mysqli_query($conn, "
    SELECT * FROM pelanggan 
    ORDER BY id_pelanggan ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_pelanggan'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['no_hp'] ?></td>
    <td><?= $d['alamat'] ?></td>
    <td><?= $d['kota'] ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_pelanggan'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_pelanggan'] ?>"
           onclick="return confirm('Hapus pelanggan ini?')">
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
