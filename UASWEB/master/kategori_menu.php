<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id    = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

        mysqli_query($conn, "INSERT INTO kategori_menu (id_kategori, nama_kategori)
                         VALUES ('$id_kategori','$nama_kategori')");
    header("Location: .php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Cek apakah kategori dipakai di tabel menu
    $cek = mysqli_query($conn, "
        SELECT COUNT(*) AS total 
        FROM menu 
        WHERE id_kategori='$id'
    ");
    $row = mysqli_fetch_assoc($cek);

    if ($row['total'] > 0) {
        echo "<script>
            alert('Kategori tidak bisa dihapus karena sudah digunakan!');
            window.location='kategori_menu.php';
        </script>";
    } else {
        mysqli_query($conn, "DELETE FROM kategori_menu WHERE id_kategori='$id'");
        header("Location: kategori_menu.php");
    }
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "
        SELECT * FROM kategori_menu WHERE id_kategori='$id'
    ");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id            = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    mysqli_query($conn, "
        UPDATE kategori_menu SET
            nama_kategori='$nama_kategori'
        WHERE id_kategori='$id'
    ");

    header("Location: kategori_menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Menu</title>
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
    <h1>📁 Data Kategori Menu</h1>
</div>

<!-- FORM -->
<div class="content-card">
    <h3><?= $edit ? "Edit Kategori" : "Tambah Kategori"; ?></h3>

    <form method="post" class="form-grid">
        <input type="hidden" name="id_kategori"
               value="<?= $edit ? $dataEdit['id_kategori'] : '' ?>">

        <div class="form-group">
            <label>ID</label>
            <input type="text" name="ID"
                   value="<?= $edit ? $dataEdit['ID'] : '' ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori"
                   value="<?= $edit ? $dataEdit['nama_kategori'] : '' ?>"
                   required>
        </div>

        <div class="form-group form-action">
            <?php if ($edit) { ?>
                <button type="submit" name="update" class="btn-primary">Update</button>
                <a href="kategori_menu.php" class="btn-secondary">Batal</a>
            <?php } else { ?>
                <button type="submit" name="tambah" class="btn-primary">Tambah</button>
            <?php } ?>
        </div>
    </form>
</div>

<!-- TABEL -->
<div class="content-card">
    <h3>Daftar Kategori Menu</h3>

    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $data = mysqli_query($conn, "
            SELECT * FROM kategori_menu ORDER BY id_kategori ASC
        ");
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
            <tr>
                <td><?= $d['id_kategori'] ?></td>
                <td><?= $d['nama_kategori'] ?></td>
                <td>
                    <a class="btn-edit" href="?edit=<?= $d['id_kategori'] ?>">Edit</a>
                    <a class="btn-hapus"
                       href="?hapus=<?= $d['id_kategori'] ?>"
                       onclick="return confirm('Hapus kategori ini?')">
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
