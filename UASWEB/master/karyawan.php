<?php
include "../databes/koneksi.php";

/* ================= TAMBAH DATA ================= */
if (isset($_POST['tambah'])) {
    $id    = $_POST['id'];
    $nama    = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji    = $_POST['gaji'];
    $lokasi  = $_POST['lokasi'];

    mysqli_query($conn, "
        INSERT INTO karyawan (id_karyawan, nama, jabatan, gaji, lokasi)
        VALUES ('$id_karyawan', '$nama', '$jabatan', '$gaji', '$lokasi')
    ");

    header("Location: karyawan.php");
    exit;
}

/* ================= HAPUS DATA ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "DELETE FROM karyawan WHERE id_karyawan='$id'");
    header("Location: karyawan.php");
    exit;
}

/* ================= AMBIL DATA EDIT ================= */
$edit = false;
$dataEdit = [];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;

    $q = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan='$id'");
    $dataEdit = mysqli_fetch_assoc($q);
}

/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {
    $id      = $_POST['id_karyawan'];
    $nama    = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji    = $_POST['gaji'];
    $lokasi  = $_POST['lokasi'];

    mysqli_query($conn, "
        UPDATE karyawan SET
            nama='$nama',
            jabatan='$jabatan',
            gaji='$gaji',
            lokasi='$lokasi'
        WHERE id_karyawan='$id'
    ");

    header("Location: karyawan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Karyawan</title>
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
    <h1>👨‍🍳 Data Karyawan</h1>
</div>

<!-- ================= FORM ================= -->
<div class="content-card">
<form method="post" class="form-grid">
    <input type="hidden" name="id_karyawan"
        value="<?= $edit ? $dataEdit['id_karyawan'] : '' ?>">

    <div class="form-group">
        <label>ID_karyawan</label>
        <input type="text" name="id_karyawan"
            value="<?= $edit ? $dataEdit['id_karyawan'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Nama Karyawan</label>
        <input type="text" name="nama"
            value="<?= $edit ? $dataEdit['nama'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Jabatan</label>
        <select name="jabatan" required>
            <option value="">-- Pilih Jabatan --</option>
            <?php
            $jabatanList = ['Koki','Kasir','Admin','Kurir'];
            foreach ($jabatanList as $j) {
                $selected = ($edit && $dataEdit['jabatan'] == $j) ? "selected" : "";
                echo "<option value='$j' $selected>$j</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Gaji</label>
        <input type="number" name="gaji"
            value="<?= $edit ? $dataEdit['gaji'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label>Lokasi</label>
        <select name="lokasi" required>
            <option value="">-- Pilih Lokasi --</option>
            <?php
            $lokasiList = ['Dapur','Front','Office','Lapangan'];
            foreach ($lokasiList as $l) {
                $selected = ($edit && $dataEdit['lokasi'] == $l) ? "selected" : "";
                echo "<option value='$l' $selected>$l</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group form-action">
        <?php if ($edit) { ?>
            <button type="submit" name="update" class="btn-primary">Update</button>
            <a href="karyawan.php" class="btn-secondary">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        <?php } ?>
    </div>
</form>
</div>

<!-- ================= TABEL ================= -->
<div class="content-card">
<h3>Daftar Karyawan</h3>

<table class="table-modern">
<thead>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Gaji</th>
    <th>Lokasi</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$data = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY id_karyawan ASC");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $d['id_karyawan'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['jabatan'] ?></td>
    <td>Rp <?= number_format($d['gaji'], 0, ',', '.') ?></td>
    <td><?= $d['lokasi'] ?></td>
    <td>
        <a class="btn-edit" href="?edit=<?= $d['id_karyawan'] ?>">Edit</a>
        <a class="btn-hapus"
           href="?hapus=<?= $d['id_karyawan'] ?>"
           onclick="return confirm('Hapus karyawan ini?')">
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
