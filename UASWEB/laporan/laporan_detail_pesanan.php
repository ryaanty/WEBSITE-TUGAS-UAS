<?php
include "../databes/koneksi.php";

$query = mysqli_query($conn, "
    SELECT
        ps.id_pesanan,
        ps.tanggal,
        pl.nama,
        m.nama_menu,
        dp.jumlah,
        m.harga,
        (dp.jumlah * m.harga) AS subtotal
    FROM detail_pesanan dp
    JOIN pesanan ps ON dp.id_pesanan = ps.id_pesanan
    JOIN menu m ON dp.id_menu = m.id_menu
    JOIN pelanggan pl ON ps.id_pelanggan = pl.id_pelanggan
    ORDER BY ps.id_pesanan
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail Pesanan</title>
    <link rel="stylesheet" href="../css/utama.css">
    <style>
        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<?php include __DIR__ . "/../layout/sidebar.php"; ?>

<!-- KONTEN -->
<div class="content">
    <h2>Laporan Detail Pesanan</h2>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>

            <?php $no = 1; ?>
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['id_pesanan'] ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nama_menu'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td>Rp <?= number_format($data['harga'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($data['subtotal'], 0, ',', '.') ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
