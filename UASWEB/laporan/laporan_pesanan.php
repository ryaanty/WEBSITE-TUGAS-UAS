<?php
// koneksi database (PERBAIKAN PATH)
include __DIR__ . "/../databes/koneksi.php";

// query laporan pesanan (JOIN 2 tabel)
$query = mysqli_query($conn, "
    SELECT
        ps.id_pesanan,
        ps.tanggal,
        pl.nama,
        ps.total,
        ps.status
    FROM pesanan ps
    JOIN pelanggan pl ON ps.id_pelanggan = pl.id_pelanggan
    ORDER BY ps.tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pesanan</title>
    <link rel="stylesheet" href="../css/utama.css">

    <style>
        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .table-wrapper {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        h2 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR (PATH AMAN) -->
<?php include __DIR__ . "/../layout/sidebar.php"; ?>

<!-- KONTEN -->
<div class="content">
    <h2>Laporan Pesanan</h2>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Status</th>
            </tr>

            <?php $no = 1; ?>
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['id_pesanan'] ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td>Rp <?= number_format($data['total'], 0, ',', '.') ?></td>
                <td><?= $data['status'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
