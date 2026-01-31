<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_menu   = $_POST['nama_menu'];
    $harga       = $_POST['harga'];

    mysqli_query($conn, "INSERT INTO menu (id_kategori, nama_menu, harga)
                         VALUES ('$id_kategori','$nama_menu','$harga')");
    header("Location: menu.php");
    exit;
}

/*============ HAPUS DATA ==========*/
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $cek = mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total 
         FROM detail_pesanan 
         WHERE id_menu='$id'"
    );

    $row = mysqli_fetch_assoc($cek);

    if ($row['total'] > 0) {
        echo "<script>
            alert('Menu tidak bisa dihapus karena sudah digunakan di transaksi!');
            window.location='menu.php';
        </script>";
    } else {
        mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$id'");
        header("Location: menu.php");
    }
    exit;
}


/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;
    $q = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id'");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id          = $_POST['id_menu'];
    $id_kategori = $_POST['id_kategori'];
    $nama_menu   = $_POST['nama_menu'];
    $harga       = $_POST['harga'];

    mysqli_query($conn, "UPDATE menu SET
        id_kategori='$id_kategori',
        nama_menu='$nama_menu',
        harga='$harga'
        WHERE id_menu='$id'");

    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Menu</title>
    <link rel="stylesheet" href="../css/utama.css?v=2">
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
        <h1>🍱 Data Menu</h1>
    </div>

    <!-- ================= FORM ================= -->
<!-- ================= FORM ================= -->
<div class="content-card">
<form method="post" class="form-grid">
    <input type="hidden" name="id_menu" value="<?= $edit ? $dataEdit['id_menu'] : '' ?>">

    <div class="form-group">
        <label>ID</label>
        <input type="number" name="ID"
               value="<?= $edit ? $dataEdit['ID'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>id kategori</label>
        <input type="number" name="id_kategori"
               value="<?= $edit ? $dataEdit['id_kategori'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>nama menu</label>
        <input type="text" name="nama_menu"
               value="<?= $edit ? $dataEdit['nama_menu'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>harga</label>
        <input type="number" name="harga"
               value="<?= $edit ? $dataEdit['harga'] : '' ?>" required>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="menu.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>


    <!-- ================= TABEL ================= -->
    <div class="content-card">
        <h3>Daftar Menu</h3>

        <table class="table-modern">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Kategori</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM menu ORDER BY id_menu ASC");
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $d['id_menu'] ?></td>
            <td><?= $d['id_kategori'] ?></td>
            <td><?= $d['nama_menu'] ?></td>
            <td>Rp <?= number_format($d['harga'], 0, ',', '.') ?></td>
            <td>
                <a class="btn-edit" href="?edit=<?= $d['id_menu'] ?>">Edit</a>
                <a class="btn-hapus" href="?hapus=<?= $d['id_menu'] ?>"
                   onclick="return confirm('Hapus menu ini?')">Hapus</a>
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
