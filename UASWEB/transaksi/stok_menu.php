<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id_menu     = $_POST['id_menu'];
    $stok_awal   = $_POST['stok_awal'];
    $stok_masuk  = $_POST['stok_masuk'];
    $stok_keluar = $_POST['stok_keluar'];
    $stok_akhir  = $stok_awal + $stok_masuk - $stok_keluar;
    $tanggal     = $_POST['tanggal'];

    mysqli_query($conn, "
        INSERT INTO stok_menu 
        (id_menu, stok_awal, stok_masuk, stok_keluar, stok_akhir, tanggal)
        VALUES 
        ('$id_menu','$stok_awal','$stok_masuk','$stok_keluar','$stok_akhir','$tanggal')
    ");

    header("Location: stok_menu.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM stok_menu WHERE id_stok='$id'");
    header("Location: stok_menu.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;
    $q = mysqli_query($conn, "SELECT * FROM stok_menu WHERE id_stok='$id'");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id          = $_POST['id_stok'];
    $id_menu     = $_POST['id_menu'];
    $stok_awal   = $_POST['stok_awal'];
    $stok_masuk  = $_POST['stok_masuk'];
    $stok_keluar = $_POST['stok_keluar'];
    $stok_akhir  = $stok_awal + $stok_masuk - $stok_keluar;
    $tanggal     = $_POST['tanggal'];

    mysqli_query($conn, "
        UPDATE stok_menu SET
            id_menu='$id_menu',
            stok_awal='$stok_awal',
            stok_masuk='$stok_masuk',
            stok_keluar='$stok_keluar',
            stok_akhir='$stok_akhir',
            tanggal='$tanggal'
        WHERE id_stok='$id'
    ");

    header("Location: stok_menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stok Menu</title>
    <link rel="stylesheet" href="../css/utama.css">
</head>
<body>

<div class="layout">

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


<main class="main">

<div class="header-card">
    <h1>📦 Data Stok Menu</h1>
</div>

<!-- FORM -->
<div class="content-card">
<h3><?= $edit ? "Edit Stok Menu" : "Tambah Stok Menu"; ?></h3>

<form method="post" class="form-grid">
    <input type="hidden" name="id_stok" value="<?= $edit ? $dataEdit['id_stok'] : '' ?>">

    <div class="form-group">
        <label>Menu</label>
        <select name="id_menu" required>
            <option value="">-- Pilih Menu --</option>
            <?php
            $menu = mysqli_query($conn, "SELECT * FROM menu");
            while ($m = mysqli_fetch_assoc($menu)) {
                $sel = ($edit && $dataEdit['id_menu'] == $m['id_menu']) ? 'selected' : '';
                echo "<option value='{$m['id_menu']}' $sel>{$m['nama_menu']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Stok Awal</label>
        <input type="number" name="stok_awal" value="<?= $edit ? $dataEdit['stok_awal'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Stok Masuk</label>
        <input type="number" name="stok_masuk" value="<?= $edit ? $dataEdit['stok_masuk'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Stok Keluar</label>
        <input type="number" name="stok_keluar" value="<?= $edit ? $dataEdit['stok_keluar'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $edit ? $dataEdit['tanggal'] : date('Y-m-d') ?>" required>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="stok_menu.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>

<!-- TABEL -->
<div class="content-card">
<h3>Daftar Stok Menu</h3>

<table class="table-modern">
<thead>
<tr>
    <th>No</th>
    <th>Menu</th>
    <th>Awal</th>
    <th>Masuk</th>
    <th>Keluar</th>
    <th>Akhir</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
$data = mysqli_query($conn, "
    SELECT sm.*, m.nama_menu
    FROM stok_menu sm
    LEFT JOIN menu m ON sm.id_menu = m.id_menu
    ORDER BY sm.id_stok ASC
");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama_menu'] ?></td>
    <td><?= $d['stok_awal'] ?></td>
    <td><?= $d['stok_masuk'] ?></td>
    <td><?= $d['stok_keluar'] ?></td>
    <td><b><?= $d['stok_akhir'] ?></b></td>
    <td><?= date('d-m-Y', strtotime($d['tanggal'])) ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_stok'] ?>">Edit</a>
        <a class="btn-hapus" href="?hapus=<?= $d['id_stok'] ?>"
           onclick="return confirm('Hapus data stok ini?')">Hapus</a>
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
